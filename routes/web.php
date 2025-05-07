<?php

use App\Http\Controllers\KepalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Models\Kepala;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/surat',[DashboardController::class,'createSurat'])->name('dashboard.createSurat');
Route::post('/dashboard/storesurat',[DashboardController::class,'suratStore'])->name('dashboard.suratStore');
// Route::get('tes',[TesController::class,'index']);
// Route::post('/upload',[TesController::class,'upload'])->name('upload');
Route::get('/galeri',[DashboardController::class,'galeri'])->name('galeri');
Route::get('/artikel',[DashboardController::class,'artikel'])->name('artikel');
Route::get('/profiles',[DashboardController::class,'profiles'])->name('profiles');
Route::get('/profileskepalasekolah',[DashboardController::class,'profileKepala'])->name('profileKepala');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/surat/toggle-acc/{id_surat}', [AdminController::class, 'toggleAcc'])->name('surat.toggleAcc');
});





//guru routes
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
    Route::get('guru/surat',[GuruController::class,'index'])->name('guru.surat');
    Route::get('guru/{id}/lihat',[GuruController::class,'lihat'])->name('guru.lihat');
    Route::get('guru/suratizin',[GuruController::class,'suratIzin'])->name('guru.suratIzin');
    Route::get('guru/tambahsuratizin',[GuruController::class,'tambahSuratIzin'])->name('guru.tambahSuratIzin');
    Route::post('guru/storesuratizin',[GuruController::class,'StoreSuratIzin'])->name('guru.storeSuratIzin');
    Route::get('guru/kelas',[GuruController::class,'kelas'])->name('guru.kelas');
    Route::get('guru/kelas/{id}/edit',[GuruController::class,'editKelas'])->name('guru.editKelas');
    Route::put('guru/kelas/{id}',[GuruController::class,'updateKelas'])->name('guru.updateKelas');
    Route::delete('guru/kelas/{id}',[GuruController::class,'deleteKelas'])->name('guru.deleteKelas');
    Route::get('guru/tambahkelas',[GuruController::class,'tambahKelas'])->name('guru.tambahKelas');
    Route::post('guru/storeSiswa',[GuruController::class,'storeSiswa'])->name('guru.storeSiswa');
    Route::get('guru/suratmasuk',[GuruController::class,'suratMasuk'])->name('guru.suratMasuk');
    Route::post('guru/storemasuk',[GuruController::class,'storeMasuk'])->name('guru.storeMasuk');
});
//kepala routes
Route::middleware(['auth', 'role:kepala'])->group(function () {
    Route::get('kepala/{id}/lihat',[KepalaController::class,'lihat'])->name('kepala.lihat');
    Route::get('/kepala/dashboard', [KepalaController::class, 'dashboard'])->name('kepala.dashboard');
    Route::get('/kepala/surat', [KepalaController::class, 'suratIzin'])->name('kepala.surat');
    // Route::get('/kepala/kelas', [KepalaController::class, 'surat'])->name('kepala.kelas');
    Route::get('/kepala/kelas', [KepalaController::class, 'guru'])->name('kepala.kelas');
});


//kelas routes
Route::middleware(['auth', 'role:kelas'])->group(function () {
    Route::get('/kelas/dashboard', [KelasController::class, 'dashboard'])->name('kelas.dashboard');
});

//instansi routes
//menjadi admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/{id}/lihat',[adminController::class,'lihatSuratIzin'])->name('admin.lihat');
    Route::get('/admin/template', [AdminController::class, 'index'])->name('admin.template');
    Route::get('/admin/keluar', [AdminController::class, 'suratKeluar'])->name('admin.keluar');
    Route::get('/admin/allsurat', [AdminController::class, 'getAllSurat'])->name('admin.allSurat');
    Route::get('/admin/tambahmasuk', [AdminController::class, 'tambahMasuk'])->name('admin.tambahmasuk');
    Route::get('/admin/tambahkeluar', [AdminController::class, 'tambahKeluar'])->name('admin.tambahkeluar');
    Route::post('suratskeluar', [AdminController::class, 'storeKeluar'])->name('suratskeluar.store');
    Route::get('/admin/suratIzin', [AdminController::class, 'suratIzin'])->name('admin.suratIzin');
    Route::get('admin/tambahsuratizin',[AdminController::class,'tambahSuratIzin'])->name('admin.tambahSuratIzin');
    Route::post('admin/storesuratizin',[AdminController::class,'StoreSuratIzin'])->name('admin.storeSuratIzin');

    //surat
    Route::post('surats', [AdminController::class, 'store'])->name('surats.store');
    Route::get('/surat/{id}/lihat', [AdminController::class, 'lihat'])->name('surat.lihat');
    Route::get('/surat/{id}/edit', [AdminController::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [AdminController::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [AdminController::class, 'destroy'])->name('surat.delete');


    //user
    Route::delete('/user/{id}', [AdminController::class, 'destroyUser'])->name('user.destroy');
    Route::get('user', [AdminController::class, 'getUser'])->name('user');
    Route::put('user/{id}', [AdminController::class, 'updateUser'])->name('user.update');
    Route::get('user/{id}/edit',[AdminController::class,'editUser'])->name('user.edit');


    //guru
    Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.guru');
    Route::get('/admin/tambahGuru',[AdminController::class,'tambahGuru'])->name('admin.tambahGuru');
    Route::post('/admin/storeguru',[AdminController::class,'storeGuru'])->name("admin.storeGuru");

    //galeri
    Route::get('/admin/galeri',[AdminController::class,'galeri'])->name('admin.galeri');
    Route::get('/admin/tambahGaleri',[AdminController::class,'tambahGaleri'])->name('admin.tambahGaleri');
    Route::post('/admin/storeGaleri',[AdminController::class,'storeGaleri'])->name("admin.storeGaleri");
    Route::get('/admin/galeri/{id}/edit',[AdminController::class,'editGaleri'])->name('admin.editGaleri');
    Route::put('/admin/galeri/{id}',[AdminController::class,'updateGaleri'])->name('admin.updateGaleri');
    Route::delete('/admin/galeri/{id}',[AdminController::class,'destroyGaleri'])->name('admin.destroyGaleri');

    //artikel
    Route::get('/admin/artikel',[AdminController::class,'artikel'])->name('admin.artikel');
    Route::get('/admin/tambahArtikel',[AdminController::class,'tambahArtikel'])->name('admin.tambahArtikel');
    Route::post('/admin/storeArtikel',[AdminController::class,'storeArtikel'])->name("admin.storeArtikel");
    Route::get('/admin/artikel/{id}/edit',[AdminController::class,'editArtikel'])->name('admin.editArtikel');
    Route::put('/admin/artikel/{id}',[AdminController::class,'updateArtikel'])->name('admin.updateArtikel');
    Route::delete('/admin/artikel/{id}',[AdminController::class,'destroyArtikel'])->name('admin.deleteArtikel');


    //profile
    Route::get('/admin/profile',[AdminController::class,'editProfile'])->name('admin.editProfile');
    Route::put('/admin/profile/{id}',[AdminController::class,'updateProfile'])->name('admin.updateProfile');

    //principal_profile
    Route::get('/admin/kepalasekolah',[AdminController::class,'editKepala'])->name('admin.editKepala');
    Route::put('/admin/kepalasekolah/{id}',[AdminController::class,'updateKepala'])->name('admin.updateKepala');


});



require __DIR__ . '/auth.php';
