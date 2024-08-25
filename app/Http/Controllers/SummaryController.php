<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Summary;
use Illuminate\Support\Facades\Log;

class SummaryController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $summary = $user->summary;

        if (!$summary) {
            $summary = new Summary();
            $summary->id_user = $user->id;
            $summary->nama = $user->name;
            $summary->email = $user->email;
            $summary->save();

            $user->is_summary = true;
            $user->save();
        }

        return view('profile.summary', compact('user', 'summary'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $summary = Summary::findOrFail($id);

        // Pastikan user hanya bisa mengedit summary miliknya sendiri
        if ($summary->id_user !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('profile.summary-edit', compact('user', 'summary'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $summary = Summary::findOrFail($id);

        if ($summary->id_user !== $user->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
        }

        if ($user->level === 'admin') {
            $validatedData = $request->validate([
                'foto_pp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'deskripsi' => 'nullable|string',
            ]);
        } else {
            $validatedData = $request->validate([
                'foto_pp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nama_mitra' => 'required|string|min:11|max:255',
                'nama' => 'required|string|min:11|max:255',
                'no_telp' => 'required|string|min:11|max:20',
                'email' => 'required|email|min:11|max:255',
                'alamat' => 'nullable|string|min:11',
                'deskripsi' => 'nullable|string|min:11',
            ]);
        }

        if ($request->hasFile('foto_pp')) {
            $imageName = time().'.'.$request->foto_pp->extension();  
            $request->foto_pp->storeAs('public/images/profile', $imageName);
            $validatedData['foto_pp'] = $imageName;
        } elseif (!$summary->foto_pp) {
            $validatedData['foto_pp'] = 'profile.png';
        }

        $summary->fill($validatedData);
        $summary->save();

        // Update user name and email
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Profile updated successfully']);
        }

        return redirect()->route('summary.show')->with('success', 'Profile updated successfully');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $summary = new Summary();
        $summary->id_user = $user->id;

        // Validasi dan simpan data seperti di method update
        $validatedData = $request->validate([
            'foto_pp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_mitra' => 'required|string|min:11|max:255',
            'nama' => 'required|string|min:11|max:255',
            'no_telp' => 'required|string|min:11|max:20',
            'email' => 'required|email|min:11|max:255',
            'alamat' => 'nullable|string|min:11',
            'deskripsi' => 'nullable|string|min:11',
        ]);

        if ($request->hasFile('foto_pp')) {
            $imageName = time().'.'.$request->foto_pp->extension();  
            $request->foto_pp->storeAs('public/images/profile', $imageName);
            $validatedData['foto_pp'] = $imageName;
        }

        $summary->fill($validatedData);
        $summary->save();

        // Update user name and email
        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->route('summary.show')->with('success', 'Profile created successfully');
    }
}