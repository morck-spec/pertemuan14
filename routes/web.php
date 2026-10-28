<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes - Pertemuan 14 (CRUD Data Siswa)
|--------------------------------------------------------------------------
| Seluruh rute tampilan CRUD Data Siswa dibuat lengkap:
| - GET    /              -> Daftar Siswa (Index)
| - GET    /siswa         -> Daftar Siswa (Index)
| - GET    /siswa/create  -> Form Tambah Siswa (Create)
| - POST   /siswa         -> Proses Simpan Siswa (Store)
| - GET    /siswa/{id}    -> Rincian Siswa (Show)
| - GET    /siswa/{id}/edit -> Form Ubah Siswa (Edit)
| - PUT    /siswa/{id}    -> Proses Update Siswa (Update)
| - DELETE /siswa/{id}    -> Proses Hapus Siswa (Destroy)
|--------------------------------------------------------------------------
*/

// Redirect / default route ke tampilan data siswa
Route::get('/', [SiswaController::class, 'index'])->name('home');

// Routes CRUD Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');