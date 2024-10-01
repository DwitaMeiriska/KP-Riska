<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Surat;
use App\Models\SuratIzin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $totalSurat = SuratIzin::count();
        $totalTerima = SuratIzin::where('status', 'terima')->count();
        $totalTolak = SuratIzin::where('status', 'tolak')->count();
        $totalBelum = SuratIzin::where('status', 'belum')->count();
        $latestIzinMasuk = SuratIzin::with('surat')
            ->orderBy('created_at', 'desc')
            ->first();
        $oldestIzinMasuk = SuratIzin::with('surat')
            ->orderBy('created_at', 'asc')
            ->first();

        return view('guru.index',compact('totalSurat', 'totalTerima', 'totalTolak', 'totalBelum', 'latestIzinMasuk', 'oldestIzinMasuk'));
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
    public function lihat($id)
    {
        $surat = Surat::find($id);
        return  view('guru/lihat', compact('surat'));
    }

    public function tambahSuratIzin()
    {
        return view("guru.tambahSuratIzin");
    }
    public function suratIzin()
    {
        $data = SuratIzin::with('surat')->paginate(10); // Ambil data surat izin beserta surat terkait

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
        return view("guru/suratIzin", compact('data', 'totalSurat', 'latestIzinMasuk', 'oldestIzinMasuk'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function storeSuratIzin(Request $request)
    {
        // dd($request);
        // Validasi data input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kode_surat' => 'required|string|max:50',
            // 'tujuan' => 'required|string|max:50',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required|string|max:100',
            'file_surat' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png', // Tipe file yang diizinkan
        ]);

        // Dapatkan informasi file yang diunggah
        $file = $request->file('file_surat');

        // Buat nama file unik
        $fileName = 'surat_' . time() . '_' . Str::slug($request->kode_surat) . '.' . $file->getClientOriginalExtension();

        // Simpan file surat dan dapatkan path
        $fileSuratPath = $file->move(public_path('surat_files'), $fileName);

        // Buat surat baru
        $surat = Surat::create([
            'user_id' => $request->user_id,
            'kode_surat' => $request->kode_surat,
            'judul' => $request->judul,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'jenis_surat' => $request->jenis_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => "masuk",
        ]);

        $id_surat = $surat->id_surat;
        // dd($id_surat);
        $izin = SuratIzin::create([
            'nama_siswa' => $request->pengirim,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'keterangan' => $request->keterangan,
            'status' => $request->status_izin,
            'lampiran' => 'surat_files/' . $fileName,
            'id_surat' => $id_surat //didapat dari id_surat pada tabel surat yang baru saja dimasukkan diatas

        ]);
        // dd($izin);


        // Redirect setelah berhasil disimpan
        return redirect()->route('guru.suratIzin')->with('success', 'Surat berhasil ditambahkan');
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

    public function kelas()
{
    $data = Kelas::where('guru_id', auth()->user()->id)->paginate(10);

    $totalSiswa = Kelas::where('guru_id', auth()->user()->id)->count();

    $kelas = Kelas::where('guru_id', auth()->user()->id)->first();

    // Check if $kelas is not null before accessing its properties
    $kelasName = $kelas ? $kelas->kelas : 'Tidak ada kelas tersedia';  // Handle null case

    return view('kelas.kelas', compact('data', 'totalSiswa', 'kelasName'));
}
    public function tambahKelas(){
        return view('kelas.tambahSiswa');
    }

    public function storeSiswa(Request $request){

        $data = Kelas::create($request->all());
        return redirect()->route('guru.kelas')->with('success', 'Data Kelas Berhasil');
    }

    public function editKelas($id){
        $data = Kelas::find($id);
        return view('kelas.edit',compact('data'));
}

    public function updateKelas(Request $request, $id){
        $data = Kelas::find($id);
        $data->update($request->all());
        return redirect()->route('guru.kelas')->with('success', 'Data Kelas Berhasil');
    }

    public function deleteKelas($id){
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->route('guru.kelas')->with('success', 'Data Kelas Berhasil');
    }
}
