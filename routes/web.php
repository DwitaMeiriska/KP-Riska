<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





//guru routes
Route::middleware(['auth','role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
});


//kelas routes
Route::middleware(['auth','role:kelas'])->group(function () {
    Route::get('/kelas/dashboard', [KelasController::class, 'dashboard'])->name('kelas.dashboard');
});

//instansi routes
Route::middleware(['auth','role:instansi'])->group(function () {
    Route::get('/instansi/dashboard', [InstansiController::class, 'dashboard'])->name('instansi.dashboard');
});


require __DIR__.'/auth.php';
