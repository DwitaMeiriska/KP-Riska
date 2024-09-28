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
    Route::post('surats', [AdminController::class, 'store'])->name('surats.store');
    Route::get('/surat/{id}/lihat', [AdminController::class, 'lihat'])->name('surat.lihat');
});


require __DIR__ . '/auth.php';
