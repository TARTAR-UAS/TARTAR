<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\BiodataChangeRequest;
use App\Models\Histori_Pendidikan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function layoutAdmin(){
        return view('layout-admin');
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
}
