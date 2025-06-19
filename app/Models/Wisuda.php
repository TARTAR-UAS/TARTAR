<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisuda extends Model
{

    protected $table = 'wisuda';

    protected $fillable = [
        'mahasiswa_id',
        'status',
        'ipk_akhir',
        'tanggal_pengajuan',
    ];
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

}