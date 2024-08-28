<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use App\Models\Sektor;
use App\Models\Program;
use App\Models\Proyek;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardLaporanController extends Controller
{
   

    public function laporan(Request $request)
    {
        $query = $this->getFilteredQuery($request);

        $laporans = $query->latest()->paginate($request->input('per_page', 5))->withQueryString();

        $laporans->getCollection()->transform(function ($laporan) {
            $laporan->formatted_realisasi = 'Rp ' . number_format($laporan->realisasi, 0, ',', '.');
            $laporan->formatted_lokasi = $laporan->proyek->lokasi ?? 'Tidak ada lokasi';
            
            // Format TGL REALISASI
            $laporan->formatted_tgl_realisasi = $this->formatTanggalRealisasi($laporan);
            
            // Format LAPORAN DIKIRIM
            $laporan->formatted_tgl_laporan = $laporan->created_at ? $laporan->created_at->format('d M Y') : 'Tidak ada tanggal';
            
            return $laporan;
        });

        $tahunList = Laporan::select('tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc')
                        ->pluck('tahun');

        return view('dashboard.laporan.laporan', compact('laporans', 'tahunList'));
    }

    private function formatTanggalRealisasi($laporan)
    {
        if (!$laporan->tanggal || !$laporan->bulan || !$laporan->tahun) {
            return 'Data tidak lengkap';
        }

        $bulanIndonesia = [
            'januari' => 'Jan', 'februari' => 'Feb', 'maret' => 'Mar',
            'april' => 'Apr', 'mei' => 'Mei', 'juni' => 'Jun',
            'juli' => 'Jul', 'agustus' => 'Agu', 'september' => 'Sep',
            'oktober' => 'Okt', 'november' => 'Nov', 'desember' => 'Des'
        ];

        $bulan = strtolower($laporan->bulan);
        $bulanFormatted = $bulanIndonesia[$bulan] ?? $laporan->bulan;

        return sprintf('%02d %s %s', $laporan->tanggal, $bulanFormatted, $laporan->tahun);
    }

    public function create()
    {
        $sektors = Sektor::all();
        $programs = Program::all();
        $proyeks = Proyek::all();

        return view('dashboard.laporan.create', compact('sektors', 'programs', 'proyeks'));
    }

    public function store(Request $request)
    {
        \Log::info('Laporan submission started', $request->except('images'));
        \Log::info('Files in request', ['files' => $request->allFiles()]);

        try {
            $validatedData = $request->validate([
                'id_user' => 'required',
                'id_sektor' => 'required',
                'id_program' => 'required',
                'id_proyek' => 'nullable',
                'judul_laporan' => 'required',
                'tanggal' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'realisasi' => 'required|numeric',
                'deskripsi' => 'nullable',
                'images' => 'nullable|array|max:4',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    if ($index >= 4) break;
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $path = $image->storeAs('laporan_images', $filename, 'public');
                    $images[] = $path;
                    \Log::info('Image stored', ['path' => $path]);
                }
            } else {
                \Log::info('No images found in request');
            }

            if (empty($images)) {
                $images[] = 'images/thumbnail.png';
                \Log::info('Using default thumbnail');
            }

            $validatedData['images'] = json_encode($images);
            $validatedData['status'] = $request->has('save_draft') ? 'draf' : 'pending';

            $laporan = Laporan::create($validatedData);
            \Log::info('Laporan created', ['id' => $laporan->id, 'images' => $laporan->images]);

            return redirect()->route('dashboard.laporan')->with('success', 'Laporan berhasil disimpan.');
        } catch (\Exception $e) {
            \Log::error('Error creating Laporan: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Laporan $laporan)
    {
        $user = Auth::user();
        if ($user->level === 'admin' && $laporan->status === 'draf') {
            return redirect()->route('dashboard.laporan')->with('error', 'Anda tidak memiliki akses ke laporan draft.');
        }
        if ($user->level === 'mitra' && $laporan->user_id !== $user->id) {
            return redirect()->route('dashboard.laporan')->with('error', 'Anda tidak memiliki akses ke laporan ini.');
        }
        $images = json_decode($laporan->images) ?? [];
        return view('dashboard.laporan.detail-laporan', compact('laporan', 'images'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $user = Auth::user();
        
        if ($user->level === 'admin') {
            // Validasi untuk admin
            $request->validate([
                'status' => 'required|in:tolak,revisi,terbit',
                'pesan_admin' => 'required|string',
            ]);

            $laporan->status = $request->status;
            $laporan->pesan_admin = $request->pesan_admin;
            $laporan->save();

            return redirect()->route('dashboard.laporan.show', $laporan)->with('success', 'Status laporan berhasil diperbarui.');
        } elseif ($user->level === 'mitra' && $laporan->id_user === $user->id) {
            // Validasi untuk mitra
            $validatedData = $request->validate([
                'judul_laporan' => 'required',
                'id_sektor' => 'required',
                'id_program' => 'required',
                'id_proyek' => 'nullable',
                'tanggal' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'realisasi' => 'required|numeric',
                'deskripsi' => 'nullable',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Update laporan
            $laporan->update($validatedData);

            // Handle penghapusan gambar
            if ($request->has('removed_images')) {
                $removedImages = is_array($request->removed_images) 
                    ? $request->removed_images 
                    : explode(',', $request->removed_images);
                
                $currentImages = $laporan->images ?? [];
                $updatedImages = array_diff($currentImages, $removedImages);
                
                // Hapus file gambar yang dihapus
                foreach ($removedImages as $image) {
                    Storage::disk('public')->delete($image);
                }
                
                $laporan->images = array_values($updatedImages);
            }

            // Handle penambahan gambar baru
            if ($request->hasFile('images')) {
                $currentImages = $laporan->images ?? [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('laporan_images', 'public');
                    $currentImages[] = $path;
                }
                $laporan->images = $currentImages;
            }

            $laporan->save();

            return redirect()->route('dashboard.laporan.show', $laporan)->with('success', 'Laporan berhasil diupdate.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengupdate laporan ini.');
        }
    }

    private function getStatusLabel($status)
    {
        switch ($status) {
            case 'pending':
                return 'Pending';
            case 'revisi':
                return 'Revisi';
            case 'terbit':
                return 'Terbit';
            case 'tolak':
                return 'Tolak';
            default:
                return ucfirst($status);
        }
    }

    public function detail($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('dashboard.laporan.detail-laporan', compact('laporan'));
    }

    public function downloadCsv(Request $request)
    {
        $query = $this->getFilteredQuery($request);
        // Implementasi unduh CSV
    }

    public function downloadPdf(Request $request)
    {
        $query = $this->getFilteredQuery($request);
        $laporans = $query->get();

        $pdf = PDF::loadView('pdf.laporan', compact('laporans'));
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream('Laporan_CSR_Kabupaten_Cirebon.pdf');
    }

    private function getFilteredQuery(Request $request)
    {
        $query = Laporan::query();
        
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('quarter')) {
            $quarter = $request->quarter;
            $query->where(function($q) use ($quarter) {
                if ($quarter == 1) {
                    $q->whereIn('bulan', ['januari', 'februari', 'maret']);
                } elseif ($quarter == 2) {
                    $q->whereIn('bulan', ['april', 'mei', 'juni']);
                } elseif ($quarter == 3) {
                    $q->whereIn('bulan', ['juli', 'agustus', 'september']);
                } elseif ($quarter == 4) {
                    $q->whereIn('bulan', ['oktober', 'november', 'desember']);
                }
            });
        }

        return $query;
    }

    public function destroy(Laporan $laporan)
    {
        $user = Auth::user();
        
        // Pastikan hanya mitra pemilik laporan yang bisa menghapus
        if ($user->level !== 'mitra' || $laporan->id_user !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus laporan ini.');
        }

        // Hapus gambar-gambar terkait
        $images = json_decode($laporan->images, true);
        foreach ($images as $image) {
            if ($image !== 'images/thumbnail.png') {
                Storage::disk('public')->delete($image);
            }
        }

        // Hapus laporan
        $laporan->delete();

        return redirect()->route('dashboard.laporan')->with('success', 'Laporan berhasil dihapus.');
    }

    public function edit(Laporan $laporan)
    {
        $user = Auth::user();
        
        // Cek apakah pengguna adalah mitra dan pemilik laporan
        if ($user->level !== 'mitra' || $laporan->id_user !== $user->id) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses untuk mengedit laporan ini.');
        }

        // Cek status laporan
        if ($laporan->status === 'tolak' || $laporan->status === 'terbit') {
            return redirect()->route('dashboard.laporan.show', $laporan)->with('error', 'Laporan yang sudah ditolak atau diterbitkan tidak dapat diedit.');
        }

        // Kode yang sudah ada untuk menampilkan halaman edit
        $sektors = Sektor::all();
        $programs = Program::all();
        $proyeks = Proyek::all();
        return view('dashboard.laporan.edit', compact('laporan', 'sektors', 'programs', 'proyeks'));
    }

    public function removeImage(Request $request, Laporan $laporan)
    {
        $imageToRemove = $request->image;
        $currentImages = $laporan->images ?? [];

        if (($key = array_search($imageToRemove, $currentImages)) !== false) {
            unset($currentImages[$key]);
            Storage::disk('public')->delete($imageToRemove);
            
            $laporan->images = array_values($currentImages);
            $laporan->save();
            
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:pending,revisi,tolak,terbit',
            'pesan_admin' => 'nullable|string',
        ]);

        $laporan->status = $request->status;
        $laporan->pesan_admin = $request->pesan_admin;
        $laporan->save();

        return response()->json(['success' => true, 'message' => 'Status laporan berhasil diperbarui.']);
    }
}