<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanStudi extends Model
{
    protected $table = 'pengajuan_studi';
    protected $fillable = ['mahasiswa_id', 'status', 'alasan', 'biaya'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function mataKuliah() {
        return $this->belongsToMany(MataKuliah::class, 'mata_kuliah_pengajuan');
    }
}
