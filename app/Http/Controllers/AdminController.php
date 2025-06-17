<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\BiodataChangeRequest;
use App\Models\Histori_Pendidikan;
use App\Models\Mahasiswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
class AdminController extends Controller {

    public function layoutAdmin(){
        return view('layout-admin');
    }

    public function showManajemenAkun(){
        $queryMahasiswaPending = Mahasiswa::where('status_akun', 'Pending');
        $mahasiswaPending = $queryMahasiswaPending->paginate(10);
        return view('admin.manajemen-akun', compact('mahasiswaPending'));
    }

    public function terimaVerifikasi($id){
        $mahasiswa = Mahasiswa::findOrfail($id);
        $prefix = '535200';
        $suffix = $mahasiswa->id;

        $mahasiswa->npm = $prefix . $suffix;
        $mahasiswa->status_akun = 'Verified';
        $mahasiswa->status_perkuliahan = 'Aktif';
        $mahasiswa->angkatan = '2025';
        $mahasiswa->save();
        return back()->with('success', 'Akun mahasiswa berhasil diverifikasi');
    }

    public function tolakVerifikasi($id){
        $mahasiswa = Mahasiswa::findOrfail($id);

        $mahasiswa-> status_akun = 'Rejected';
        $mahasiswa->save();
        return back()->with('success', 'Akun mahasiswa berhasil ditolak');
    }

    public function listPermintaanBiodata(){
        $permintaan = BiodataChangeRequest::where('status', 'pending')->get();
        return view('admin.permintaan-biodata', compact('permintaan'));
    }

    public function setujuiPermintaan($id){
        $permintaan = BiodataChangeRequest::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($permintaan->mahasiswa_id);

        if ($permintaan->status !== 'pending') {
            return redirect()->back()->with('error', 'Permintaan ini sudah diproses.');
        }

        $dataBaru = $permintaan->data_baru;

        switch ($permintaan->kategori) {
                case 'mahasiswa':
                    $mahasiswa->update($dataBaru);
                    break;

                case 'orangtua':
                    Orangtua::updateOrCreate(
                    ['mahasiswa_id' => $mahasiswa->id],
                    $dataBaru
                    );
                    break;

                case 'pendidikan':
                    Histori_Pendidikan::updateOrCreate(
                    ['mahasiswa_id' => $mahasiswa->id],
                    $dataBaru
                     );
                    break;
                }

        $permintaan->status = 'approved';
        $permintaan->save();

        return redirect()->back()->with('success', 'Permintaan perubahan disetujui dan data berhasil diperbarui.');
    }


    public function tolakPermintaan(Request $request, $id) {
        $permintaan = BiodataChangeRequest::findOrFail($id);
        $permintaan->status = 'rejected';
        $permintaan->alasan_penolakan = $request->alasan_penolakan;
        $permintaan->save();

        return back()->with('error', 'Permintaan biodata ditolak.');
    }

    public function ubahStatusPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->status === 'sudah bayar') {
            return back()->with('info', 'Status sudah lunas.');
        }

        $pembayaran->status = 'sudah bayar';
        $pembayaran->save();

        return back()->with('success', 'Status pembayaran berhasil diubah menjadi sudah bayar.');
    }

    public function listPembayaran()
    {
        $pembayarans = Pembayaran::with('mahasiswa')->get();
        return view('admin.pembayaran-admin', compact('pembayarans'));
    }
        public function pengumumanAdmin()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('pengumuman.admin', compact('pengumuman'));
    }

    public function pengumumanCreate()
    {
        return view('pengumuman.create');
    }

    public function pengumumanStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);


        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengumuman-admin')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function pengumumanEdit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function pengumumanUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengumuman-admin')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function pengumumanDelete($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman-admin')->with('success', 'Pengumuman berhasil dihapus.');
    }
}