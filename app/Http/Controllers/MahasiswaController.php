<?php

namespace App\Http\Controllers;

use App\Models\Histori_Pendidikan;
use App\Models\BiodataChangeRequest;
use App\Models\Pendidikan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Orangtua;



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

    public function pilihKategori(){
        return view('pilih-kategori');
    }

    public function formPengajuan($kategori) {
        if (!in_array($kategori, ['mahasiswa', 'orangtua', 'pendidikan'])) {
            abort(404);
        }
        return view("form-ajukan-$kategori");
    }

    public function ajukanPerubahanBiodata(Request $request){
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $dataPerubahan = $request->validate([
        'nama_depan'     => ['required', 'max:255'],
        'nama_belakang'  => ['required', 'max:255'],
        'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
        'agama' => ['required','in:Islam,Kristen,Katolik,Buddha,Hindu,Konghucu'],
        'tanggal_lahir'  => ['required'],
        'tempat_lahir'   => ['required', 'max:255'],
        'alamat'         => ['required', 'max:255'],
        'program_studi'  => ['required', 'max:255'],
        'fakultas'       => ['required', 'max:255'],
        ]);

        BiodataChangeRequest::create([
        'mahasiswa_id' => $mahasiswa->id,
        'kategori' => 'mahasiswa',
        'data_baru' => $dataPerubahan,
        'status' => 'pending'
        ]);

        return redirect()->route('biodata')->with('success', 'Permintaan perubahan biodata telah diajukan dan menunggu persetujuan admin.');
    }   

    public function ajukanPerubahanOrangTua(Request $request){
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $dataPerubahan = $request->validate([
        'nama_ayah' => ['required', 'max:255'], 
        'pekerjaan_ayah' => ['required', 'max:255'], 
        'no_telp_ayah' => ['required', 'max:255'], 
        'nama_ibu' => ['required', 'max:255'], 
        'pekerjaan_ibu' => ['required', 'max:255'], 
        'no_telp_ibu'=> ['required', 'max:255'],
        ]);

        BiodataChangeRequest::create([
        'mahasiswa_id' => $mahasiswa->id,
        'kategori' => 'orangtua',
        'data_baru' => $dataPerubahan,
        'status' => 'pending'
        ]);

        return redirect()->route('biodata')->with('success', 'Permintaan perubahan data orang tua telah diajukan dan menunggu persetujuan admin.');
    }   

    public function ajukanPerubahanPendidikan(Request $request){
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $dataPerubahan = $request->validate([
        'nama_sekolah' => ['required', 'max:255'], 
        'jenis_sekolah' => ['required','in:SMA,SMK,MA'],
        'jurusan' => ['required', 'max:255'],
        'tanggal_masuk' => ['required'], 
        'tanggal_lulus' => ['required'], 
        'lokasi_sekolah' => ['required', 'max:255'],
        'nilai_akhir' => ['required', 'numeric', 'between:0,100'], 
        ]);

        BiodataChangeRequest::create([
        'mahasiswa_id' => $mahasiswa->id,
        'kategori' => 'pendidikan',
        'data_baru' => $dataPerubahan,
        'status' => 'pending'
        ]);

        return redirect()->route('biodata')->with('success', 'Permintaan perubahan biodata telah diajukan dan menunggu persetujuan admin.');
    }   

     // Tampilkan halaman Biodata
    public function biodata(){
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        if ($mahasiswa) {
            $mahasiswa->load(['histori_pendidikan', 'orangtua']);
        }
        return view('biodata', compact('user', 'mahasiswa'));
    }

    public function showAkademik(){
        return view('akademik');
    }
}