<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    /**
     * Mengambil data dari tabel jurusan.
     */
    public function index(): View
    {
        $jurusan = DB::table('jurusan')->get();

        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Menampilkan halaman form tambah jurusan.
     */
    public function create(): View
    {
        return view('jurusan.create');
    }

    /**
     * Memvalidasi dan menyimpan data jurusan baru.
     */
    public function prosesSimpan(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:100',
        ], [
            'nama_jurusan.required' => 'Nama jurusan wajib diisi!',
            'nama_jurusan.max' => 'Nama jurusan maksimal 100 karakter!',
        ]);

        DB::table('jurusan')->insert([
            'nama_jurusan' => $request->nama_jurusan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/jurusan')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    /**
     * Mengambil 1 baris data jurusan berdasarkan ID.
     */
    public function edit(int|string $id): View
    {
        $jurusan = DB::table('jurusan')->where('id', $id)->first();

        if (! $jurusan) {
            abort(404);
        }

        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Memvalidasi dan memperbarui data jurusan.
     */
    public function prosesEdit(Request $request, int|string $id): RedirectResponse
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:100',
        ], [
            'nama_jurusan.required' => 'Nama jurusan wajib diisi!',
            'nama_jurusan.max' => 'Nama jurusan maksimal 100 karakter!',
        ]);

        DB::table('jurusan')->where('id', $id)->update([
            'nama_jurusan' => $request->nama_jurusan,
            'updated_at' => now(),
        ]);

        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    /**
     * Menghapus data jurusan berdasarkan ID.
     */
    public function prosesHapus(int|string $id): RedirectResponse
    {
        DB::table('jurusan')->where('id', $id)->delete();

        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus!');
    }
}
