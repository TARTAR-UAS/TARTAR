<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'mahasiswa_id',
        'tahun',
        'jenis',
        'va',
        'batas',
        'jumlah',
        'bank',
        'status',
        'pengajuan_studi_id',
        'keterangan',
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
