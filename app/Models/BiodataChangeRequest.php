<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataChangeRequest extends Model
{
    protected $table = 'biodata_change_requests';

    protected $fillable = [
        'mahasiswa_id', 'kategori', 'data_baru', 'status', 'alasan_penolakan'
    ];

    protected $casts = [
        'data_baru' => 'array'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
