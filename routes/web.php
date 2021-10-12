<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuketController;
use App\Http\Controllers\SutugController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\SuunController;
use App\Http\Controllers\SuberController;
use App\Http\Controllers\TerkirimController;
use Illuminate\Http\Request;
 
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/simpan', [UserController::class, 'simpan']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::get('/suratKeterangan', [SuketController::class, 'index']);

Route::get('/suratTugas', [SutugController::class, 'index']);

Route::get('/suratPersonalia', [SuperController::class, 'index']);

Route::get('/suratBerita', [SuberController::class, 'index']);

Route::get('/suratUndangan', [SuunController::class, 'index']);

Route::get('/suratTerkirim', [TerkirimController::class, 'index']);

Auth::routes();
 
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/suratMasuk', [App\Http\Controllers\HomeController::class, 'smasuk'])->name('smasuk');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('suratMasuka', [AdminController::class, 'smasuk']);
    });
 
    Route::middleware(['dosen'])->group(function () {
        Route::get('dosen', [DosenController::class, 'index']);
        Route::get('suratMasukd', [DosenController::class, 'smasuk']);
    });

    Route::middleware(['mahasiswa'])->group(function () {
        Route::get('mahasiswa', [MahasiswaController::class, 'index']);
        Route::get('suratMasukm', [MahasiswaController::class, 'smasuk']);
    });
 
    /*Route::get('/logout', function(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    });*/
 
});