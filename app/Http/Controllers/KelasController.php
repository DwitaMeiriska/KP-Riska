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
     * Display a listing of the resource.
     */
    public function dashboard(){
        $nisn = auth()->user()->email;
        $nisnFix =  explode('_', $nisn)[0];
        // $data = SuratIzin::where('nisn', $nisn)->get();
        $data = SuratIzin::where('nisn', $nisnFix)->get();
        // dd($data);
        return view('kelas.dashboard', compact('data'));
      }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nisn = auth()->user()->email;
        $nisnFix =  explode('_', $nisn)[0];
        $data = SuratIzin::where('nisn', $nisnFix)->join('surats', 'surat_izins.id_surat', '=', 'surats.id_surat')->first();
        // dd($nisnFix);
        return view('kelas.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
         // Validasi input
    $request->validate([
        'nama_siswa' => 'required|string|max:100',
        'nisn' => 'required|string|max:30',
        'kelas' => 'required|string|max:10',
        'keterangan' => 'required|string',
        'status' => 'required',
        'lampiran' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
    ]);
    $noSurat = "000";
    $date = now()->format('Y-m-d');
    // Upload file surat
    if ($request->hasFile('lampiran')) {
        $file = $request->file('lampiran');
        $filename = 'surat_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        // $filepath = $file->storeAs('surat_files', $filename, 'public');
        $filepath = $file->move(public_path('surat_files'), $filename);
    } else {
        $filepath = null;
    }
    $guru = Guru::with('user')->where('user_id', $request->user_id)->first();
    $surat = Surat::create([
            'user_id' => $request->user_id,
            'kode_surat' => "Izin",
            'judul' => $request->judul,
            'tujuan' => $guru->user->name,
            'pengirim' => $request->nama_siswa,
            'tanggal_surat' => $date,
            'no_surat' => $noSurat,
            'jenis_surat' => "izin_sekolah",
            'file_surat' => 'surat_files/' . $filename, // Simpan path file yang diupload
            'status' => "masuk",
            'acc' => "belum",
        ]);
        $id_surat = $surat->id_surat;
    // Simpan data surat
    SuratIzin::create([
        'nama_siswa' => $request->nama_siswa,
        'nisn' => $request->nisn,
        'kelas' => $request->kelas,
        'keterangan' => $request->keterangan,
        'status' => $request->status,
        'lampiran' =>'surat_files/' . $filename,
        'id_surat' => $id_surat, // jika belum auto increment, sesuaikan kebutuhan
    ]);

    return redirect()->back()->with('success', 'Surat izin berhasil ditambahkan.');
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
