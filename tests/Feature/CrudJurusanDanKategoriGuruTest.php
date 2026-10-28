<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CrudJurusanDanKategoriGuruTest extends TestCase
{
    use RefreshDatabase;

    public function test_crud_jurusan_berjalan_lengkap(): void
    {
        // 1. Index & Create
        $this->get('/jurusan')->assertStatus(200);
        $this->get('/jurusan/create')->assertStatus(200);

        // 2. Proses Simpan (Tambah)
        $responseStore = $this->post('/jurusan', [
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);
        $responseStore->assertRedirect('/jurusan');
        $this->assertDatabaseHas('jurusan', [
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);

        $jurusan = DB::table('jurusan')->first();

        // 3. Edit & Proses Edit (Update)
        $this->get("/jurusan/{$jurusan->id}/edit")->assertStatus(200);
        $responseUpdate = $this->put("/jurusan/{$jurusan->id}", [
            'nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
        ]);
        $responseUpdate->assertRedirect('/jurusan');
        $this->assertDatabaseHas('jurusan', [
            'id' => $jurusan->id,
            'nama_jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
        ]);

        // 4. Proses Hapus (Delete)
        $responseDelete = $this->delete("/jurusan/{$jurusan->id}");
        $responseDelete->assertRedirect('/jurusan');
        $this->assertDatabaseMissing('jurusan', [
            'id' => $jurusan->id,
        ]);
    }

    public function test_crud_kategori_guru_berjalan_lengkap(): void
    {
        // 1. Index & Create
        $this->get('/kategori-guru')->assertStatus(200);
        $this->get('/kategori-guru/create')->assertStatus(200);

        // 2. Proses Simpan (Tambah)
        $responseStore = $this->post('/kategori-guru', [
            'nama_kategori' => 'Guru Produktif',
            'keterangan' => 'Pengajar mata pelajaran kejuruan',
        ]);
        $responseStore->assertRedirect('/kategori-guru');
        $this->assertDatabaseHas('kategori_guru', [
            'nama_kategori' => 'Guru Produktif',
            'keterangan' => 'Pengajar mata pelajaran kejuruan',
        ]);

        $kategori = DB::table('kategori_guru')->first();

        // 3. Edit & Proses Edit (Update)
        $this->get("/kategori-guru/{$kategori->id}/edit")->assertStatus(200);
        $responseUpdate = $this->put("/kategori-guru/{$kategori->id}", [
            'nama_kategori' => 'Guru Produktif RPL',
            'keterangan' => 'Pengajar produktif Rekayasa Perangkat Lunak',
        ]);
        $responseUpdate->assertRedirect('/kategori-guru');
        $this->assertDatabaseHas('kategori_guru', [
            'id' => $kategori->id,
            'nama_kategori' => 'Guru Produktif RPL',
        ]);

        // 4. Proses Hapus (Delete)
        $responseDelete = $this->delete("/kategori-guru/{$kategori->id}");
        $responseDelete->assertRedirect('/kategori-guru');
        $this->assertDatabaseMissing('kategori_guru', [
            'id' => $kategori->id,
        ]);
    }
}
