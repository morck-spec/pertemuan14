<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KategoriGuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Pertemuan 14 (CRUD Database MySQL)
|--------------------------------------------------------------------------
*/

// Default route
Route::get('/', [JurusanController::class, 'index'])->name('home');

// Routes CRUD Jurusan (Query Builder)
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'prosesSimpan'])->name('jurusan.store');
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/{id}', [JurusanController::class, 'prosesEdit'])->name('jurusan.update');
Route::delete('/jurusan/{id}', [JurusanController::class, 'prosesHapus'])->name('jurusan.destroy');

// Routes CRUD Kategori Guru (Tugas Praktikum - Query Builder)
Route::get('/kategori-guru', [KategoriGuruController::class, 'index'])->name('kategori-guru.index');
Route::get('/kategori-guru/create', [KategoriGuruController::class, 'create'])->name('kategori-guru.create');
Route::post('/kategori-guru', [KategoriGuruController::class, 'prosesSimpan'])->name('kategori-guru.store');
Route::get('/kategori-guru/{id}/edit', [KategoriGuruController::class, 'edit'])->name('kategori-guru.edit');
Route::put('/kategori-guru/{id}', [KategoriGuruController::class, 'prosesEdit'])->name('kategori-guru.update');
Route::delete('/kategori-guru/{id}', [KategoriGuruController::class, 'prosesHapus'])->name('kategori-guru.destroy');

// Routes CRUD Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
