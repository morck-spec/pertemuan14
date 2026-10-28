<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    /**
     * Tampilkan seluruh data siswa dari database (READ / INDEX)
     */
    public function index()
    {
        // Mengambil data siswa beserta relasi kelasnya dari database
        $siswaList = Siswa::with('kelas')->orderBy('id', 'desc')->get();

        // Statistik dinamis langsung dari database
        $totalSiswa = $siswaList->count();
        $totalLaki = $siswaList->where('jenis_kelamin', 'L')->count();
        $totalPerempuan = $siswaList->where('jenis_kelamin', 'P')->count();
        $totalKelas = Kelas::count();
        $kelasList = Kelas::all();

        return view('siswa.index', compact(
            'siswaList',
            'totalSiswa',
            'totalLaki',
            'totalPerempuan',
            'totalKelas',
            'kelasList'
        ));
    }

    /**
     * Tampilkan formulir tambah siswa baru (CREATE)
     */
    public function create()
    {
        // Ambil data pilihan kelas dari database
        $kelasList = Kelas::all();

        return view('siswa.create', compact('kelasList'));
    }

    /**
     * Simpan data siswa baru ke database MySQL (STORE)
     */
    public function store(Request $request)
    {
        // Validasi input data dari form
        $validated = $request->validate([
            'nisn'          => 'required|max:20',
            'nama'          => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'required|exists:kelas,id',
            'alamat'        => 'required',
        ]);

        // Simpan ke database
        Siswa::create($validated);

        return redirect('/siswa')->with('success', 'Data siswa baru berhasil disimpan ke database!');
    }

    /**
     * Tampilkan rincian lengkap siswa tertentu (SHOW)
     */
    public function show($id)
    {
        // Cari siswa berdasarkan ID beserta data kelasnya
        $siswa = Siswa::with('kelas')->findOrFail($id);

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Tampilkan formulir edit data siswa (EDIT)
     */
    public function edit($id)
    {
        // Ambil data siswa yang akan diedit dan daftar pilihan kelas
        $siswa = Siswa::findOrFail($id);
        $kelasList = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelasList'));
    }

    /**
     * Simpan perubahan data siswa ke database (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Validasi data perubahan
        $validated = $request->validate([
            'nisn'          => 'required|max:20',
            'nama'          => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kelas_id'      => 'required|exists:kelas,id',
            'alamat'        => 'required',
        ]);

        // Update ke database
        $siswa->update($validated);

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui di database!');
    }

    /**
     * Hapus data siswa dari database (DESTROY)
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $namaSiswa = $siswa->nama;

        // Hapus dari database
        $siswa->delete();

        return redirect('/siswa')->with('success', "Data siswa {$namaSiswa} berhasil dihapus dari database!");
    }
}
