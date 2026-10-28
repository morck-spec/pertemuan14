<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriGuruController extends Controller
{
    /**
     * Mengambil seluruh data dari tabel kategori_guru.
     */
    public function index(): View
    {
        $kategoriGuru = DB::table('kategori_guru')->get();

        return view('kategori_guru.index', compact('kategoriGuru'));
    }

    /**
     * Menampilkan halaman form tambah kategori guru.
     */
    public function create(): View
    {
        return view('kategori_guru.create');
    }

    /**
     * Memvalidasi dan menyimpan data kategori guru baru ke database.
     */
    public function prosesSimpan(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori guru wajib diisi!',
            'nama_kategori.max' => 'Nama kategori guru maksimal 100 karakter!',
        ]);

        DB::table('kategori_guru')->insert([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/kategori-guru')->with('success', 'Data kategori guru berhasil ditambahkan!');
    }

    /**
     * Mengambil 1 baris data kategori guru berdasarkan ID.
     */
    public function edit(int|string $id): View
    {
        $kategoriGuru = DB::table('kategori_guru')->where('id', $id)->first();

        if (! $kategoriGuru) {
            abort(404);
        }

        return view('kategori_guru.edit', compact('kategoriGuru'));
    }

    /**
     * Memvalidasi dan memperbarui data kategori guru berdasarkan ID.
     */
    public function prosesEdit(Request $request, int|string $id): RedirectResponse
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori guru wajib diisi!',
            'nama_kategori.max' => 'Nama kategori guru maksimal 100 karakter!',
        ]);

        DB::table('kategori_guru')->where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

        return redirect('/kategori-guru')->with('success', 'Data kategori guru berhasil diperbarui!');
    }

    /**
     * Menghapus data kategori guru berdasarkan ID.
     */
    public function prosesHapus(int|string $id): RedirectResponse
    {
        DB::table('kategori_guru')->where('id', $id)->delete();

        return redirect('/kategori-guru')->with('success', 'Data kategori guru berhasil dihapus!');
    }
}
