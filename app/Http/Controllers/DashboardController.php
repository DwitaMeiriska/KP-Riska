<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrincipalProfile;

class DashboardController extends Controller
{
    public function index()
{
    $artikels = Artikel::latest()->take(10)->get();
    $galeris = Galeri::latest()->take(10)->get();
    return view('dashboard.dashboard', compact('artikels','galeris'));
}


    public function createSurat()
    {
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
            'file_surat' => 'required|file|mimes:pdf,doc,docx,png,jpeg|max:2048', // validasi file surat
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
            'acc' => 'ya'
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('dashboard.createSurat')->with('success', 'Surat berhasil ditambahkan');
    }
    public function galeri()
    {
        $data = Galeri::all();
        return view('dashboard.galeri.index', compact('data'));
    }


    public function artikel(Request $request)
    {
        // Ambil kategori dari request, jika ada
        $kategori = $request->query('kategori');

        // Ambil artikel berdasarkan kategori jika kategori dipilih, urutkan berdasarkan tanggal terbaru
        if ($kategori) {
            $artikels = Artikel::where('kategori', $kategori)
                ->orderBy('tgl_upload', 'desc')
                ->paginate(10);
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua artikel
            $artikels = Artikel::orderBy('tgl_upload', 'desc')
                ->paginate(10);
        }

        // Mengirim data artikel dan kategori yang dipilih ke view
        return view('dashboard.artikel.index', compact('artikels', 'kategori'));
    }

    public function profiles()
    {
        $profile = Profile::first();
        return view('dashboard.profile.index', compact('profile'));
    }
    public function profileKepala(){
        $profile = PrincipalProfile::first();
        return view('dashboard.principal_profile.index', compact('profile'));
    }

}
