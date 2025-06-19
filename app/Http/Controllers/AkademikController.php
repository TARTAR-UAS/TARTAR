<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiMahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalKuliah;
use Illuminate\Support\Facades\DB;



class AkademikController extends Controller
{
    
   
    public function histori() {
    $mahasiswa = Auth::user()->mahasiswa;

    $data = $mahasiswa
        ->nilaiMahasiswa()
        ->with('mata_kuliah') // pastikan eager loading relasi
        ->get();

    return view('akademik.histori', compact('data'));
    }


    public function jadwal() {
    
        $jadwal = DB::table('jadwal_kuliah')->get();
        return view('akademik.jadwal', compact('jadwal'));
    }


    public function statusKuliah()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        return view('akademik.status-kuliah', compact('mahasiswa')); 
    }

   }

