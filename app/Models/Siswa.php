<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Nama tabel di database
    protected $table = 'siswa';

    // Tabel tidak menggunakan kolom created_at dan updated_at
    public $timestamps = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'nisn',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'kelas_id',
    ];

    /**
     * Relasi siswa memiliki / terhubung ke satu kelas (Belongs To)
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
