<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Surat;
use App\Models\SuratIzin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Menampilkan dashboard siswa.
     */
    public function dashboard()
    {
        $nisn = auth()->user()->email;
        $nisnFix = explode('_', $nisn)[0];

        $data = SuratIzin::where('nisn', $nisnFix)->get();
        return view('kelas.dashboard', compact('data'));
    }

    /**
     * Tampilkan form input surat izin.
     */
    public function create()
    {
        $nisn = explode('_', auth()->user()->email)[0];
        $data = Kelas::where('nisn', $nisn)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('kelas.create', compact('data'));
    }

    /**
     * Simpan surat izin baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nisn'       => 'required|string|max:30',
            'kelas'      => 'required|string|max:10',
            'judul'      => 'required|string|max:255',
            'keterangan' => 'required|string',
            'status'     => 'required',
            'lampiran'   => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        // Ambil ID user yang login
        $userId = auth()->id();
        $date   = now()->format('Y-m-d');
        $noSurat = "000";

        // Upload file
        $filename = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = 'surat_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('surat_files'), $filename);
        }

        // Ambil guru berdasarkan user_id (relasi)
        $guru = Guru::with('user')->where('user_id', $userId)->first();
        if (!$guru || !$guru->user) {
            return redirect()->back()->with('error', 'Data guru atau user tidak ditemukan.');
        }

        // Simpan ke tabel Surat
        $surat = Surat::create([
            'user_id'       => $userId,
            'kode_surat'    => "Izin",
            'judul'         => $request->judul,
            'tujuan'        => $guru->user->name,
            'pengirim'      => $request->nama_siswa,
            'tanggal_surat' => $date,
            'no_surat'      => $noSurat,
            'jenis_surat'   => "izin_sekolah",
            'file_surat'    => $filename ? 'surat_files/' . $filename : null,
            'status'        => "masuk",
            'acc'           => "belum",
        ]);

        // Simpan ke tabel SuratIzin
        SuratIzin::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn'       => $request->nisn,
            'kelas'      => $request->kelas,
            'keterangan' => $request->keterangan,
            'status'     => $request->status,
            'lampiran'   => $filename ? 'surat_files/' . $filename : null,
            'id_surat'   => $surat->id_surat,
        ]);

        return redirect()->back()->with('success', 'Surat izin berhasil ditambahkan.');
    }

    public function index() { /* Kosong */ }
    public function show(string $id) { /* Kosong */ }
    public function edit(string $id) { /* Kosong */ }
    public function update(Request $request, string $id) { /* Kosong */ }
    public function destroy(string $id) { /* Kosong */ }
}
