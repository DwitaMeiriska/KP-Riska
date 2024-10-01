<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
});


//kelas routes
Route::middleware(['auth', 'role:kelas'])->group(function () {
    Route::get('/kelas/dashboard', [KelasController::class, 'dashboard'])->name('kelas.dashboard');
});

//instansi routes
//menjadi admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/template', [AdminController::class, 'index'])->name('admin.template');
    Route::get('/admin/keluar', [AdminController::class, 'suratKeluar'])->name('admin.keluar');
    Route::get('/admin/allsurat', [AdminController::class, 'getAllSurat'])->name('admin.allSurat');
    Route::get('/admin/tambahmasuk', [AdminController::class, 'tambahMasuk'])->name('admin.tambahmasuk');
    Route::get('/admin/tambahkeluar', [AdminController::class, 'tambahKeluar'])->name('admin.tambahkeluar');
    Route::post('suratskeluar', [AdminController::class, 'storeKeluar'])->name('suratskeluar.store');
    Route::post('surats', [AdminController::class, 'store'])->name('surats.store');
    Route::get('/surat/{id}/lihat', [AdminController::class, 'lihat'])->name('surat.lihat');
    Route::get('/surat/{id}/edit', [AdminController::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [AdminController::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [AdminController::class, 'destroy'])->name('surat.delete');
    Route::delete('/user/{id}', [AdminController::class, 'destroyUser'])->name('user.destroy');
    Route::get('user', [AdminController::class, 'getUser'])->name('user');
    Route::put('user/{id}', [AdminController::class, 'updateUser'])->name('user.update');
    Route::get('user/{id}/edit',[AdminController::class,'editUser'])->name('user.edit');
});


require __DIR__ . '/auth.php';
