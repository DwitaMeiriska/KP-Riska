<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Surat;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\Profile;
use App\Models\SuratIzin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrincipalProfile;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getAllSurat()
    {
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
    public function toggleAcc($id_surat)
{
    $surat = Surat::where('id_surat', $id_surat)->firstOrFail();
    $surat->acc = ($surat->acc === 'ya') ? 'tidak' : 'ya';
    $surat->save();

    return redirect()->back()->with('success', 'Status acc berhasil diubah.');
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
            'judul' => $request->judul,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'jenis_surat' => $request->jenis_surat,
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
            'judul' => $request->judul,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => "keluar",
            'jenis_surat' => "jenis_surat",
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
            'judul' => $request->judul,
            'kode_surat' => $request->kode_surat,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'jenis_surat' => $request->jenis_surat,
            // 'status' => $request->status,
        ]);

        // Redirect setelah berhasil di-update
        if ($surat->status == 'keluar') {
            return redirect()->route('admin.keluar')->with('success', 'Surat keluar berhasil diperbarui');
        } elseif ($surat->status == 'masuk') {
            return redirect()->route('admin.template')->with('success', 'Surat masuk berhasil diperbarui');
        } else {
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
    public function getUser()
    {
        $data = User::paginate(10);
        $totalUser = User::count();

        // Menghitung pengguna berdasarkan role (misalnya, Admin dan User)
        $totalAdmin = User::where('role', 'admin')->count();
        $totalGuru = User::where('role', 'guru')->count();
        $totalKelas = User::where('role', 'kelas')->count();
        return view("admin.user", compact('data', 'totalUser', 'totalAdmin', 'totalGuru', 'totalKelas'));
    }
    public function editUser($id)
    {
        // Ambil surat berdasarkan ID
        $user = user::find($id);

        // Pastikan surat ditemukan
        if (!$user) {
            return redirect()->route('user')->with('error', 'Surat tidak ditemukan');
        }

        // Kembalikan view dengan data surat
        return view('admin.editUser', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('user')->with('success', 'Data pengguna berhasil diperbarui');
    }
    public function destroyUser($id)
    {
        // Temukan surat berdasarkan ID
        $user = User::where('id', $id)->first();
        // dd($id);
        if (!$user) {
            return redirect()->route('surat')->with('error', 'Surat tidak ditemukan');
        }

        // Hapus file yang terkait jika ada
        // if ($surat->file_surat && file_exists(public_path($surat->file_surat))) {
        //     unlink(public_path($surat->file_surat));
        // }

        // Hapus surat dari database
        $user->delete();

        // Redirect setelah berhasil dihapus
        return redirect()->route('user')->with('success', 'Surat berhasil dihapus');
    }

    public function guru()
    {

        $data = Guru::with('user')->paginate(10);
        $totalGuru = Guru::count();
        return view(
            'admin.guru',
            compact('data', 'totalGuru')
        );
    }
    public function tambahGuru()
    {
        $user = User::where('role', 'guru')->get();

        // dd($user);
        return view('admin.tambahGuru', compact('user'));
    }

    public function storeGuru(Request $request)
    {
        // Validasi data input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nip' => 'required|string|max:100',
            'kelas' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        Guru::create([
            'user_id' => $request->user_id,
            'nip' => $request->nip,
            'kelas' => $request->kelas
        ]);

        // Redirect setelah berhasil disimpan
        return redirect()->route('admin.guru')->with('success', 'Guru berhasil ditambahkan');
    }

    public function galeri()
    {
        $galeris = Galeri::paginate(10);
        $totalGaleri = Galeri::count();
        return view(
            'admin.galeri.tampil',
            compact('galeris', 'totalGaleri')
        );
    }
    public function tambahGaleri()
    {
        return view('admin.galeri.tambahGaleri');
    }

    public function storeGaleri(Request $request)
    {
        // Validasi data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Pastikan 'file' sesuai dengan nama input
            'tgl_upload' => 'required|date',
        ]);

        // Dapatkan file gambar dari input
        $image = $request->file('file'); // Pastikan nama input file adalah 'file'
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Pindahkan file ke direktori public/file
        $image->move(public_path('file'), $filename);

        // Buat entri baru di tabel galeri
        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => 'file/' . $filename, // Simpan path yang benar
            'user' => $request->user, // Menyimpan nama user dari input
            'tgl_upload' => $request->tgl_upload,
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function editGaleri($id)
    {
        $galeri = Galeri::find($id);
        return view('admin.galeri.edit', compact('galeri'));
    }


    public function updateGaleri(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Mengubah menjadi nullable
            'tgl_upload' => 'required|date',
        ]);

        // Temukan galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Jika ada file baru diunggah
        if ($request->hasFile('file')) {
            $image = $request->file('file'); // Ambil file
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Pindahkan file ke direktori public/file
            $image->move(public_path('file'), $filename);

            // Perbarui data dengan file baru
            $galeri->file = 'file/' . $filename; // Simpan path yang benar
        }

        // Update data galeri lainnya
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->user = $request->user; // Menyimpan nama user dari input
        $galeri->tgl_upload = $request->tgl_upload;

        // Simpan perubahan
        $galeri->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil diupdate');
    }


    public function destroyGaleri($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil dihapus');
    }
    public function artikel()
    {
        // Mengambil semua artikel
        $artikels = Artikel::all();
        return view('admin.artikel.index', compact('artikels'));
    }

    public function tambahArtikel()
    {
        // Menampilkan form untuk menambah artikel baru
        return view('admin.artikel.tambah');
    }

    public function storeArtikel(Request $request)
    {
        // Validasi data input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tgl_upload' => 'required|date',
            'user' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        // Dapatkan file gambar dari input
        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // Pindahkan file ke direktori public/file
        $image->move(public_path('file'), $filename);

        // Buat entri baru di tabel artikel
        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => 'file/' . $filename, // Simpan path yang benar
            'user' => $request->user,
            'tgl_upload' => $request->tgl_upload,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function editArtikel($id)
    {
        // Menemukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function updateArtikel(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Mengubah menjadi nullable
            'tgl_upload' => 'required|date',
            'kategori' => 'required|string|max:255',
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Jika ada file baru diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($artikel->file && file_exists(public_path($artikel->file))) {
                unlink(public_path($artikel->file));
            }

            // Dapatkan informasi file yang diunggah
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Pindahkan file ke direktori public/file
            $image->move(public_path('file'), $filename);

            // Simpan path yang benar
            $artikel->file = 'file/' . $filename;
        }

        // Update data artikel lainnya
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->user = $request->user;
        $artikel->tgl_upload = $request->tgl_upload;
        $artikel->kategori = $request->kategori;

        // Simpan perubahan
        $artikel->save();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroyArtikel($id)
    {
        // Menemukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Hapus file jika ada
        if ($artikel->file && file_exists(public_path($artikel->file))) {
            unlink(public_path($artikel->file));
        }

        // Hapus artikel
        $artikel->delete();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus');
    }
    public function editProfile()
    {
        $profile = Profile::first(); // Ambil data profil pertama
        return view('admin.profile.edit', compact('profile'));
    }

    // Menyimpan perubahan profil sekolah
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'deskripsi' => 'required|string',
        ]);

        $profile = Profile::first(); // Ambil profil pertama

        // Jika belum ada profil, buat baru
        if (!$profile) {
            $profile = new Profile();
        }

        // Update atau buat profil
        $profile->update([
            'nama_sekolah' => $request->nama_sekolah,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.editProfile')->with('success', 'Profil sekolah berhasil diperbarui');
    }







    public function editKepala()
{
    $profile = PrincipalProfile::first();
    return view('admin.principal_profile.edit', compact('profile'));
}

public function updateKepala(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'visi' => 'nullable|string',
        'misi' => 'nullable|string',
        'bio' => 'nullable|string',
        'telepon' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:255',
        'nip' => 'nullable|string|max:20',
        'riwayat_pendidikan' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $profile = PrincipalProfile::first();

    if (!$profile) {
        $profile = new PrincipalProfile();
    }

    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('uploads/principal', 'public');
        $profile->foto = $fotoPath;
    }

    // Update profil kepala sekolah
    $profile->update($request->only(['nama', 'visi', 'misi', 'bio', 'telepon', 'email', 'nip', 'riwayat_pendidikan']));

    return redirect()->route('admin.editKepala')->with('success', 'Profil kepala sekolah berhasil diperbarui');
}

// Surat izin siswa
public function suratIzin()
{
    $data = SuratIzin::whereHas('surat', function ($query) {
        $query->where('user_id', auth()->user()->id);
    })->with('surat')->paginate(10);

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
    return view("admin/suratIzin", compact('data', 'totalSurat', 'latestIzinMasuk', 'oldestIzinMasuk'));
}
public function lihatSuratIzin($id)
    {
        $surat = Surat::find($id);
        return  view('admin/lihatSuratIzin', compact('surat'));
    }

    public function tambahSuratIzin()
    {
        $kelas = Kelas::all();
        // dd($kelas);
        return view("admin.tambahSuratIzin",compact('kelas'));
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
        $data = Kelas::where('nisn',$request->nisn)->first();
        // Buat surat baru
        $surat = Surat::create([
            'user_id' => $request->user_id,
            'kode_surat' => $request->kode_surat,
            'judul' => $request->judul,
            'tujuan' => $request->tujuan,
            'pengirim' => $data->name,
            'tanggal_surat' => $request->tanggal_surat,
            'no_surat' => $request->no_surat,
            'jenis_surat' => $request->jenis_surat,
            'file_surat' => 'surat_files/' . $fileName, // Simpan path file yang diupload
            'status' => "masuk",
            'acc' => "tidak",
        ]);

        $id_surat = $surat->id_surat;
        // dd($id_surat);
        $izin = SuratIzin::create([
            'nama_siswa' => $data->name,
            'nisn' => $request->nisn,
            'kelas' => $data->kelas,
            'keterangan' => $request->keterangan,
            'status' => $request->status_izin,
            'lampiran' => 'surat_files/' . $fileName,
            'id_surat' => $id_surat //didapat dari id_surat pada tabel surat yang baru saja dimasukkan diatas

        ]);
        // dd($izin);


        // Redirect setelah berhasil disimpan
        return redirect()->route('admin.suratIzin')->with('success', 'Surat berhasil ditambahkan');
    }
}
