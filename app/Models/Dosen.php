<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Jadwal;

class Dosen extends Model
{
    protected $fillable = ['nama'];

    // Relasi: Satu dosen mempunyai banyak jadwal
    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
}
