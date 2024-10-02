<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/tes');
    }


    public function createSurat(){
        return view('dashboard/createSurat');
    }

    public function suratStore(Request $request)
    {
        // Validasi input form
        $request->validate([
            'kode_surat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf,doc,docx|max:2048', // validasi file surat
            'jenis_surat' => 'required|string',
        ]);

        // Upload file surat
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');

            // Buat nama file unik dengan slug dari kode surat dan timestamp
            $fileName = 'surat_' . time() . '_' . Str::slug($request->kode_surat) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke direktori 'public/surat_files'
            $fileSuratPath = $file->move(public_path('surat_files'), $fileName);
        }

        // Simpan data surat ke database
        Surat::create([
            'user_id' => $request->user_id, // pastikan user_id sudah diterima dari form
            'judul' => $request->judul,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => 'keluar', // Default status keluar
            'jenis_surat' => $request->jenis_surat, // Mengambil dari input form
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('dashboard.createSurat')->with('success', 'Surat berhasil ditambahkan');
    }
}

