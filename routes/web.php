<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\NpdController;
use App\Http\Controllers\BmsController;
use App\Http\Controllers\YandasController;
use App\Http\Controllers\DashboardController;


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

// admin routing
Route::middleware('auth')->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
});

// user routing
Route::middleware('auth')->group(function(){
    Route::get('/user', [UserController::class,'index'])->name('user.index');
        // Rute untuk setiap tim, menggunakan controller masing-masing
});

// raouting
Route::get('/tu', [TuController::class, 'index'])->name('tu');
Route::get('/npd', [NpdController::class, 'index'])->name('npd');
Route::get('/yandas', [YandasController::class, 'index'])->name('yandas');
Route::get('/bms', [BmsController::class, 'index'])->name('bms');

// menampilkan isi table
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('yandas', YandasController::class);
});
Route::get('/yandas', [YandasController::class, 'index'])->name('yandas');
require __DIR__.'/auth.php';
