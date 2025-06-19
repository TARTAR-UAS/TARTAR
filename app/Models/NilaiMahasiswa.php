<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
   protected $table = 'nilai_mahasiswa';

   public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
   }

   public function mata_kuliah(){
        return $this->belongsTo(MataKuliah::class);
   }

}
