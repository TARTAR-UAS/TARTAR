<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function showPembayaran()
    {
        $user = Auth::user();

        if(!$user) {
            dd('User belum login');
        }

        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            dd('User tidak punya data mahasiswa', $user);
        }
        $dataPembayaran = $mahasiswa->pembayaran;

        return view('pembayaran', compact('dataPembayaran'));
    }
    
}
