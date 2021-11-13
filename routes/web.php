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

Route::get('/mahasiswa/simpan/{id}', [MahasiswaController::class, 'simpan']);
Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::get('mahasiswa/download/{id}', [MahasiswaController::class, 'download']);

Route::get('/dosen/simpan/{id}', [DosenController::class, 'simpan']);
Route::get('/dosen/delete/{id}', [DosenController::class, 'delete']);

Route::get('/admin/simpan/{id}', [AdminController::class, 'simpan']);
Route::get('/admin/delete/{id}', [AdminController::class, 'delete']);
Route::get('/admin/preview/{id}', [AdminController::class, 'preview']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
Route::put('/admin/update/{id}', [AdminController::class, 'update']);
Route::get('admin/download/{id}', [AdminController::class, 'download']);

Route::get('/suratKeterangan', [SuketController::class, 'index']);
Route::post('/suket/simpan', [SuketController::class, 'simpan']);
Route::put('/suket/update/{id}', [SuketController::class, 'update']);

Route::get('/suratTugas', [SutugController::class, 'index']);
Route::post('/sutug/simpan', [SutugController::class, 'simpan']);
Route::put('/sutug/update/{id}', [SutugController::class, 'update']);
Route::post('/getEmployees', [SutugController::class, 'getEmployees'])->name('getEmployees');

Route::get('/suratPersonalia', [SuperController::class, 'index']);
Route::post('/super/simpan', [SuperController::class, 'simpan']);

Route::get('/suratBerita', [SuberController::class, 'index']);
Route::post('/suber/simpan', [SuberController::class, 'simpan']);

Route::get('/suratUndangan', [SuunController::class, 'index']);
Route::post('/suun/simpan', [SuunController::class, 'simpan']);

Route::get('/suratTerkirim', [TerkirimController::class, 'index']);
Route::get('/terkirim/edit/{id}', [TerkirimController::class, 'edit']);
Route::put('/terkirim/update/{id}', [TerkirimController::class, 'update']);

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
 
});