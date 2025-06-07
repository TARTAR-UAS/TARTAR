<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

     // Tampilkan halaman Biodata
    public function biodata()
    {
        // Asumsikan user dengan ID 1
        $user = User::find(1);
        $mahasiswa = $user->mahasiswa;
        return view('biodata', compact('user', 'mahasiswa'));
    }

    // Tampilkan form Lengkapi Data
    public function lengkapiData()
    {
        $user = User::find(1);
        $mahasiswa = $user->mahasiswa;
        return view('lengkapi-data', compact('mahasiswa'));
    }

    // Proses update data Mahasiswa (kecuali no_telp dan password)
    public function updateData(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->program_studi = $request->program_studi;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->status = $request->status;
        $mahasiswa->save();

        return redirect('/biodata');
    }

    // Tampilkan form Ubah No HP
    public function ubahNoHp()
    {
        $mahasiswa = Mahasiswa::find(1);
        return view('ubah-no-hp', compact('mahasiswa'));
    }

    // Proses update No HP Mahasiswa
    public function updateNoHp(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->save();

        return redirect('/biodata');
    }

    // Tampilkan form Ubah Password
    public function ubahPassword()
    {
        $user = User::find(1);
        return view('ubah-password', compact('user'));
    }

    // Proses update Password User
    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/biodata');
    }

    
}
