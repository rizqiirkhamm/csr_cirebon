<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sektor;
use App\Models\Laporan;
use App\Models\Kegiatan;
use App\Models\Mitra;
use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanTerbaru = Laporan::orderBy('created_at', 'desc')->take(4)->get();
        $kegiatan = Kegiatan::latest()->take(4)->get();
        $sektor = Sektor::all();
        $mitra = Mitra::all();
        $laporan = Laporan::all();
        $faq = Faq::all();
        return view('home', compact('sektor','faq','kegiatan', 'laporan', 'laporanTerbaru', 'mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sektor = Sektor::all();
        return view('home', compact('sektor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
