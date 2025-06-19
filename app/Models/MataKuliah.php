<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $fillable = ['kode', 'nama', 'sks'];

    public function pengajuanStudi() {
        return $this->belongsToMany(PengajuanStudi::class, 'mata_kuliah_pengajuan');
    }

    public function nilaiMahasiswa(){
        return $this->hasMany(NilaiMahasiswa::class);
    } 

}
