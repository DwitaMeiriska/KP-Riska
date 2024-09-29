<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getAllSurat(){
        $totalSurat = Surat::count(); // Total surat
        // $totalSuratMasuk = Surat::where('status', 'masuk')->count(); // Total surat keluar
        $latest = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldest = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::paginate(10);
        return view('admin/dashboard', compact('data', 'totalSurat', 'latest', 'oldest'));
    }
    public function index()
    {
        $totalSurat = Surat::count(); // Total surat
        $totalSuratMasuk = Surat::where('status', 'masuk')->count(); // Total surat keluar
        $latestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldestMasuk = Surat::where('status', 'masuk')->orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::where('status', 'masuk')->paginate(10);
        return view('admin/adminDashboard', compact('data', 'totalSurat', 'totalSuratMasuk', 'latestMasuk', 'oldestMasuk'));
    }

    public function suratKeluar()
    {
        $totalSurat = Surat::count(); // Total surat
        $totalSuratKeluar = Surat::where('status', 'keluar')->count(); // Total surat keluar
        $latestKeluar = Surat::where('status', 'keluar')->orderBy('tanggal_surat', 'desc')->first(); // Tanggal surat masuk terbaru
        $oldestKeluar = Surat::where('status', 'keluar')->orderBy('tanggal_surat', 'asc')->first(); // Tanggal surat masuk terlama
        $data = Surat::where('status', 'keluar')->paginate(10);
        return view('admin/suratKeluar', compact('data', 'totalSurat', 'totalSuratKeluar', 'latestKeluar', 'oldestKeluar'));
    }
    public function tambahMasuk()
    {

        return view('admin.tambahMasuk');
    }
    public function tambahKeluar()
    {

        return view('admin.tambahKeluar');
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
        // Validasi data input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kode_surat' => 'required|string|max:50',
            // 'tujuan' => 'required|string|max:50',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required|string|max:100',
            'file_surat' => 'required|file|mimes:pdf,doc,docx', // Tipe file yang diizinkan
        ]);

        // Dapatkan informasi file yang diunggah
        $file = $request->file('file_surat');

        // Buat nama file unik
        $fileName = 'surat_' . time() . '_' . Str::slug($request->kode_surat) . '.' . $file->getClientOriginalExtension();

        // Simpan file surat dan dapatkan path
        $fileSuratPath = $file->move(public_path('surat_files'), $fileName);

        // Buat surat baru
        Surat::create([
            'user_id' => $request->user_id,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => "masuk",
        ]);

        // Redirect setelah berhasil disimpan
        return redirect()->route('admin.template')->with('success', 'Surat berhasil ditambahkan');
    }
    public function storekeluar(Request $request)
    {
        // Validasi data input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kode_surat' => 'required|string|max:50',
            'tujuan' => 'required|string|max:50',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required|string|max:100',
            'file_surat' => 'required|file|mimes:pdf,doc,docx', // Tipe file yang diizinkan
        ]);

        // Dapatkan informasi file yang diunggah
        $file = $request->file('file_surat');

        // Buat nama file unik
        $fileName = 'surat_' . time() . '_' . Str::slug($request->kode_surat) . '.' . $file->getClientOriginalExtension();

        // Simpan file surat dan dapatkan path
        $fileSuratPath = $file->move(public_path('surat_files'), $fileName);

        // Buat surat baru
        Surat::create([
            'user_id' => $request->user_id,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => "keluar",
        ]);

        // Redirect setelah berhasil disimpan
        return redirect()->route('admin.keluar')->with('success', 'Surat berhasil ditambahkan');
    }

    public function lihat($id)
    {
        $surat = Surat::where('id_surat', $id)->first();

        // Mengembalikan tampilan dengan data surat
        return view('admin.lihat', compact('surat'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil surat berdasarkan ID
        $surat = Surat::find($id);

        // Pastikan surat ditemukan
        if (!$surat) {
            return redirect()->route('admin.allSurat')->with('error', 'Surat tidak ditemukan');
        }

        // Kembalikan view dengan data surat
        return view('admin.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kode_surat' => 'required|string|max:50',
            'tujuan' => 'required|string|max:50',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required|string|max:100',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx', // File tidak wajib di-update
        ]);

        // Temukan surat berdasarkan ID
        $surat = Surat::find($id);

        if (!$surat) {
            return redirect()->route('admin.allSurat')->with('error', 'Surat tidak ditemukan');
        }

        // Jika ada file yang diunggah
        if ($request->hasFile('file_surat')) {
            // Hapus file lama jika ada
            if ($surat->file_surat && file_exists(public_path($surat->file_surat))) {
                unlink(public_path($surat->file_surat));
            }

            // Dapatkan informasi file yang diunggah
            $file = $request->file('file_surat');

            // Buat nama file unik
            $fileName = 'surat_' . time() . '_' . Str::slug($request->kode_surat) . '.' . $file->getClientOriginalExtension();

            // Simpan file surat
            $file->move(public_path('surat_files'), $fileName);

            // Update path file
            $surat->file_surat = 'surat_files/' . $fileName;
        }

        // Update data surat
        $surat->update([
            'user_id' => $request->user_id,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            // 'status' => $request->status,
        ]);

        // Redirect setelah berhasil di-update
        if($surat->status == 'keluar'){
            return redirect()->route('admin.keluar')->with('success', 'Surat keluar berhasil diperbarui');
        }elseif($surat->status == 'masuk'){
            return redirect()->route('admin.template')->with('success', 'Surat masuk berhasil diperbarui');
        }else{
            return redirect()->route('admin.allSurat')->with('success', 'Surat berhasil diperbarui');
        }
    }

    public function destroy($id)
    {
        // Temukan surat berdasarkan ID
        $surat = Surat::where('id_surat', $id)->first();
        // dd($id);
        if (!$surat) {
            return redirect()->route('admin.allSurat')->with('error', 'Surat tidak ditemukan');
        }

        // Hapus file yang terkait jika ada
        if ($surat->file_surat && file_exists(public_path($surat->file_surat))) {
            unlink(public_path($surat->file_surat));
        }

        // Hapus surat dari database
        $surat->delete();

        // Redirect setelah berhasil dihapus
        return redirect()->route('admin.allSurat')->with('success', 'Surat berhasil dihapus');
    }

}
