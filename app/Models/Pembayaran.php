<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
