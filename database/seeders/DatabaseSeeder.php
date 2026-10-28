<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (DB::table('jurusan')->count() === 0) {
            DB::table('jurusan')->insert([
                [
                    'nama_jurusan' => 'Rekayasa Perangkat Lunak (RPL)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_jurusan' => 'Desain Komunikasi Visual (DKV)',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        if (DB::table('kategori_guru')->count() === 0) {
            DB::table('kategori_guru')->insert([
                [
                    'nama_kategori' => 'Guru Produktif',
                    'keterangan' => 'Guru pengajar mata pelajaran kejuruan sesuai kompetensi keahlian.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kategori' => 'Guru Normatif & Adaptif',
                    'keterangan' => 'Guru pengajar mata pelajaran umum (Matematika, Bahasa Indonesia, Bahasa Inggris, PPKn, Agama).',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_kategori' => 'Guru Bimbingan Konseling (BK)',
                    'keterangan' => 'Guru pembimbing konseling, pengembangan diri, dan karir siswa.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
