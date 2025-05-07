<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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
        $data = Surat::orderBy('tanggal_surat', 'desc')->paginate(10);
        return view('kepala.test',compact('data', 'totalSurat', 'latest', 'oldest'));
    }
    public function index()
    {
        $totalSurat = Surat::count(); // Total surat
        $totalSuratMasuk = Surat::where('status', 'masuk')->count(); // Total surat keluar
        $latestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::where('status', 'masuk')->paginate(10);
        return view('admin/suratMasuk', compact('data', 'totalSurat', 'totalSuratMasuk', 'latestMasuk', 'oldestMasuk'));
    }

    public function suratIzin()
    {
        $data = SuratIzin::with('surat.user.guru') // pastikan relasi guru didefinisikan di model User
        ->join('surats', 'surat_izins.id_surat', '=', 'surats.id_surat')
        ->orderBy('surats.tanggal_surat', 'desc')
        ->paginate(10);



        $totalSurat = SuratIzin::count(); // Total surat izin

        // Tanggal surat izin terbaru berdasarkan surat terkait
        $latestIzinMasuk = SuratIzin::with('surat')
            ->orderBy('created_at', 'desc')
            ->first();

        // Tanggal surat izin terlama berdasarkan surat terkait
        $oldestIzinMasuk = SuratIzin::with('surat')
            ->orderBy('created_at', 'asc')
            ->first();
        // dd($latestIzinMasuk);
        return view("kepala/suratIzin", compact('data', 'totalSurat', 'latestIzinMasuk', 'oldestIzinMasuk'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function guru(){
        $guru = Guru::with('user')->get();
        return view('kepala.guru',compact('guru'));
    }
    public function lihat($id)
    {
        $surat = Surat::find($id);
        return  view('kepala/lihat', compact('surat'));
    }
}
