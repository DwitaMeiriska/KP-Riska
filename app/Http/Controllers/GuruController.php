<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard(){
        return view('guru.template.template');
      }
    public function index()
    {
        $totalSurat = Surat::count(); // Total surat
        $totalSuratMasuk = Surat::where('status', 'masuk')->count(); // Total surat keluar
        $latestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::where('status', 'masuk')->paginate(10);
        return view('guru/suratMasuk', compact('data', 'totalSurat', 'totalSuratMasuk', 'latestMasuk', 'oldestMasuk'));

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
        //
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
