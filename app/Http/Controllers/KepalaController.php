<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratIzin;
use Illuminate\Http\Request;

class KepalaController extends Controller
{

    public function dashboard()
    {
        // $totalSurat = Surat::count();
        // $totalTerima = Surat::where('status', 'ya')->count();
        // $totalTolak = Surat::where('status', 'tidak')->count();
        // $totalBelum = SuratIzin::where('status', 'belum')->count();
        // $latestIzinMasuk = SuratIzin::with('surat')
        //     ->orderBy('created_at', 'desc')
        //     ->first();
        // $oldestIzinMasuk = SuratIzin::with('surat')
        //     ->orderBy('created_at', 'asc')
        //     ->first();
        $totalSurat = Surat::count(); // Total surat
        // $totalSuratMasuk = Surat::where('status', 'masuk')->count(); // Total surat keluar
        $latest = Surat::orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldest = Surat::orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::paginate(10);
        return view('kepala.test',compact('data', 'totalSurat', 'latest', 'oldest'));
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
