<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telp',
        'program_studi',
        'fakultas',
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
