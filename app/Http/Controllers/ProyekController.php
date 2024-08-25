<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class ProyekController extends Controller
{
    public function show($id)
    {
        $proyek = Proyek::find($id);

        if (!$proyek) {
            abort(404, 'Proyek tidak ditemukan');
        }

        return view('detail', compact('proyek'));
    }
}
