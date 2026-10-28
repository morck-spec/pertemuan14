<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    // Nama tabel di database
    protected $table = 'kelas';

    // Tabel tidak menggunakan kolom created_at dan updated_at
    public $timestamps = false;

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama',
    ];

    /**
     * Relasi satu kelas memiliki banyak siswa (One to Many)
     */
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}
