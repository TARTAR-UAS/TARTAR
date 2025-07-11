<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'agama',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telp',
        'program_studi',
        'fakultas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histori_pendidikan(){
        return $this->hasMany(Histori_Pendidikan::class, 'mahasiswa_id', 'id');
    }

    public function orangtua() {
        return $this->hasOne(Orangtua::class);
    }
    
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'mahasiswa_id');
    }

    public function biodataChangeRequests(){
        return $this->hasMany(BiodataChangeRequest::class);
    }

    public function pengajuanStudi() {
        return $this->hasMany(pengajuanStudi::class);
    }

    public function nilaiMahasiswa(){
        return $this->hasMany(NilaiMahasiswa::class);
    }

    public function Wisuda(){
        return $this->hasOne(Wisuda::class);
    }
}
