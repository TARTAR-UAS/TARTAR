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
        $nama = Auth::user()->name; // ambil nama dari user yang login
        $data = NilaiMahasiswa::where('nama', $nama)->get(); // query berdasarkan nama
        return view('akademik.histori', compact('data'));
   
        
    }

    public function nilai() {
        return view('akademik.nilai');
    }

    public function jadwal() {
    
        $jadwal = DB::table('jadwal_kuliah')->get();
        return view('akademik.jadwal', compact('jadwal'));
    }

    public function kehadiran() {
        return view('akademik.kehadiran');
    }

    public function transkrip() {
        return view('akademik.transkrip');
    }
    public function statusKuliah()
    {
    return view('akademik.status-kuliah'); // pastikan view ini ada di resources/views/akademik
    }

   }

