<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewanMasukController;
use App\Http\Controllers\HewanKeluarController;
use Illuminate\Support\Facades\Auth;
use App\Exports\ExportHewanMasuk;
use App\Exports\ExportHewanKeluar;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;



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
    return redirect()->route('login');
});

Route::get('/auth', function () {
    return view('auth.index');
})->name('auth.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});


Auth::routes();

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hewan_masuk', [HewanMasukController::class, 'index'])->name('hewan_masuk.index');
Route::get('/hewan_masuk/create', [HewanMasukController::class, 'create'])->name('hewan_masuk.create');
Route::get('hewan_masuk/{id}/edit', [HewanMasukController::class, 'edit'])->name('hewan_masuk.edit');
Route::delete('hewan_masuk/{id}', [HewanMasukController::class, 'destroy'])->name('hewan_masuk.destroy');
Route::post('/hewan-masuk/store', [HewanMasukController::class, 'store'])->name('hewan_masuk.store');
Route::put('/hewan_masuk/{id}', [HewanMasukController::class, 'update'])->name('hewan_masuk.update');

Route::get('/hewan-masuk/export', [HewanMasukController::class, 'exportHewanMasuk'])->name('hewan_masuk.export');

Route::get('/hewan_keluar', [HewanKeluarController::class, 'index'])->name('hewan_keluar.index');
Route::get('/hewan_keluar/create', [HewanKeluarController::class, 'create'])->name('hewan_keluar.create');
Route::get('hewan_keluar/{id}/edit', [HewanKeluarController::class, 'edit'])->name('hewan_keluar.edit');
Route::delete('hewan_keluar{id}', [HewanKeluarController::class, 'destroy'])->name('hewan_keluar.destroy');
Route::post('/hewan_keluar/store', [HewanKeluarController::class, 'store'])->name('hewan_keluar.store');
Route::put('/hewan_keluar/{id}', [HewanKeluarController::class, 'update'])->name('hewan_keluar.update');


Route::get('/hewan-keluar/export', [HewanKeluarController::class, 'exportHewanKeluar'])->name('hewan_keluar.export');

Route::resource('users', UserController::class);Route::get('/auth/{id}/edit', [AuthController::class, 'edit'])->name('auth.edit');

Route::put('/auth/{id}', [UserController::class, 'update'])->name('auth.update');




Route::get('/register', [AuthController::class, 'register'])->name('register'); // Menampilkan form registrasi
Route::post('/register', [AuthController::class, 'store'])->name('register.store'); // Menyimpan data registrasi

