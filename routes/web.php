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

//yandascrud
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('yandas', YandasController::class);
    Route::get('/yandas/download/{id}', [YandasController::class, 'download'])->name('yandas.download');

});
Route::get('/yandas', [YandasController::class, 'index'])->name('yandas');
 
//tucrud
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('tu', TuController::class);
    Route::get('/tu/download/{id}', [TuController::class, 'download'])->name('tu.download');
  
    Route::get('/tu/create', [TuController::class, 'createForm'])->name('tu.create');

});
Route::get('/tu', [TuController::class, 'index'])->name('tu');
 
 
// npd CRUD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('npd', NpdController::class);
    Route::get('/npd/download/{id}', [NpdController::class, 'download'])->name('npd.download');
    Route::get('/npd/create', [NpdController::class, 'create'])->name('npd.create');
});
Route::get('/npd', [NpdController::class, 'index'])->name('npd');
 
// bms CRUD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('bms', BmsController::class);
    Route::get('/bms/download/{id}', [BmsController::class, 'download'])->name('bms.download');
    Route::get('/bms/create', [BmsController::class, 'create'])->name('bms.create');
});
Route::get('/bms', [BmsController::class, 'index'])->name('bms');
 
require __DIR__.'/auth.php';
