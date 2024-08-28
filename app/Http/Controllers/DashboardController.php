<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Laporan::query();

        if ($user->level === 'admin') {
            $query->with(['user', 'proyek'])->where('status', '!=', 'draf');
        } elseif ($user->level === 'mitra') {
            $query->with('proyek')->where('id_user', $user->id);
        }

        // Pencarian
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('judul_laporan', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('proyek', function($query) use ($searchTerm) {
                      $query->where('lokasi', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhere('realisasi', 'LIKE', "%{$searchTerm}%");
            });
        }

        $laporans = $query->latest()->paginate(10);

        // Pastikan images selalu array
        $laporans->getCollection()->transform(function ($laporan) {
            $laporan->images = is_array($laporan->images) ? $laporan->images : json_decode($laporan->images, true) ?? [];
            return $laporan;
        });

        return view('dashboard.laporan.laporan', compact('laporans'));
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:tolak,revisi,terbit',
            'pesan_admin' => 'required_unless:status,terbit',
        ]);

        $laporan->status = $request->status;
        $laporan->pesan_admin = $request->pesan_admin;
        $laporan->save();

        return response()->json(['message' => 'Status laporan berhasil diperbarui']);
    }
}