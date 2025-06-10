<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
   protected $table = 'orangtua';

    protected $fillable = [
        'mahasiswa_id',
        'nama_ayah',
        'pekerjaan_ayah',
        'no_telp_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'no_telp_ibu',
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
}

