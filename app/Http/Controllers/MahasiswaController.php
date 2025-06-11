<?php

namespace App\Http\Controllers;

use App\Models\Histori_Pendidikan;
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

     // Tampilkan halaman Biodata
    public function biodata()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        if ($mahasiswa) {
            $mahasiswa->load(['histori_pendidikan', 'orangtua']);
        }
        return view('biodata', compact('user', 'mahasiswa'));
    }

    // Tampilkan halaman Biodata Admin
    public function biodataAdmin()
    {
    $mahasiswa = Mahasiswa::find(Auth::user()->mahasiswa->id);
    $orangtua = OrangTua::where('mahasiswa_id', $mahasiswa->id)->first();

    return view('biodata-admin', compact('mahasiswa', 'orangtua'));
    }
    // Tampilkan form Lengkapi Data
    public function lengkapiData()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        return view('lengkapi-data', compact('mahasiswa'));
    }

    // Proses update data Mahasiswa (kecuali no_telp dan password)
    public function updateData(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $mahasiswa->update($request->all());
        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama_belakang = $request->nama_belakang;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->program_studi = $request->program_studi;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->status_perkuliahan = $request->status;
        $mahasiswa->save();
        

        return redirect('/admin/index/biodata-admin')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    // Tampilkan form Ubah Password
    public function ubahPassword()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        return view('ubah-password', compact('user'));
    }

    // Proses update Password User

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $user->password = Hash::make($request->password);

        if ($user instanceof \App\Models\User) {
            $user->save();
        } else {
            \App\Models\User::where('id', $user->id)->update([
                'password' => $user->password,
            ]);
        }

        return redirect()->route('biodata-admin')->with('success', 'Password berhasil diperbarui.');
    }


    public function ubahDataOrangtua()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        
        $orangtua = $mahasiswa->orangtua()->first();

        return view('lengkapi-data-ortu', compact('mahasiswa', 'orangtua'));
    }

    public function updateDataOrangtua(Request $request)
        {
        $request->validate([
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'no_telp_ayah' => 'nullable|string|max:20',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_telp_ibu' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        Orangtua::updateOrCreate(
            ['mahasiswa_id' => $mahasiswa->id],
            [
                'nama_ayah' => $request->nama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'no_telp_ayah' => $request->no_telp_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'no_telp_ibu' => $request->no_telp_ibu,
            ]
        );

        return redirect()->route('biodata-admin')->with('success', 'Data orang tua berhasil diperbarui.');
    }


    public function ubahDataPendidikan()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        if ($mahasiswa) {
            $mahasiswa->load('histori_pendidikan');
        }
        
        $pendidikan = Histori_Pendidikan::where('mahasiswa_id', $mahasiswa->id)->first();

        
        return view('lengkapi-data-pendidikan', compact('pendidikan'));
    }

    public function storeDataPendidikan(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'jenis_sekolah' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Histori_Pendidikan::create([
            'mahasiswa_id'    => Auth::user()->mahasiswa->id,
            'nama_sekolah'    => $request->nama_sekolah,
            'jenis_sekolah'   => $request->jenis_sekolah,
            'jurusan'         => $request->jurusan,
            'lokasi_sekolah'  => $request->lokasi_sekolah,
            'nilai_akhir'     => $request->nilai_akhir,
            'tanggal_masuk'   => $request->tanggal_masuk,
            'tanggal_lulus'   => $request->tanggal_lulus,
        ]);

        return redirect()->back()->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

        public function updateDataPendidikan(Request $request)
        {
            $request->validate([
                'nama_sekolah' => 'required|string|max:255',
                'jenis_sekolah' => 'required|string',
                'tanggal_masuk' => 'required|date',
                'tanggal_lulus' => 'nullable|date|after_or_equal:tanggal_masuk',
            ]);

            $user = Auth::user();
            $mahasiswa = $user->mahasiswa;

            $pendidikan = $mahasiswa->histori_pendidikan()->first();

            if ($pendidikan) {
                $pendidikan->nama_sekolah = $request->nama_sekolah;
                $pendidikan->jenis_sekolah = $request->jenis_sekolah;
                $pendidikan->jurusan = $request->jurusan;
                $pendidikan->lokasi_sekolah = $request->lokasi_sekolah;
                $pendidikan->nilai_akhir = $request->nilai_akhir;
                $pendidikan->tanggal_masuk = $request->tanggal_masuk;
                $pendidikan->tanggal_lulus = $request->tanggal_lulus;
                $pendidikan->save();
            } else {
                $mahasiswa->histori_pendidikan()->create([
                    'nama_sekolah' => $request->nama_sekolah,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'jurusan' => $request->jurusan,
                    'lokasi_sekolah' => $request->lokasi_sekolah,
                    'nilai_akhir' => $request->nilai_akhir,
                    'tanggal_masuk' => $request->tanggal_masuk,
                    'tanggal_lulus' => $request->tanggal_lulus,
                ]);
            }

            return redirect('/admin/index/biodata-admin')->with('success', 'Data pendidikan berhasil diperbarui.');
            
    }


}
