<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WisudaController extends Controller
{
    public function listPengajuan(){
        $data = Wisuda::with('mahasiswa')->get(); // asumsikan relasi wisuda → mahasiswa sudah ada
        return view('admin.wisuda-index', compact('data'));
    }

    public function updatePengajuan(Request $request, $id){
        $request->validate([
        'status' => ['required', 'string' , 'max:255'],
         ]);

        $wisuda = Wisuda::findOrFail($id);
        $wisuda->status = $request->status;
        $wisuda->save();

        return redirect()->route('admin-wisuda-index')->with('success', 'Status wisuda berhasil diperbarui.');
    }

    public function showStatus()
    {
        $user = Auth::user(); 
        $mahasiswa = $user->mahasiswa;

        $status = Wisuda::where('mahasiswa_id', $mahasiswa->id)->first();
        return view('status-wisuda', compact('mahasiswa', 'status'));
    }

    public function showWisudaForm()
    {
        return view('form-wisuda');
    }

    public function wisudaForm(Request $request){
        $mahasiswa = Auth::user()->mahasiswa;

        $request->validate([
        'ipk_akhir' => ['required', 'numeric', 'between:0,4.00'],
        'tanggal_pengajuan' => ['required', 'date'],
        ]);

        Wisuda::updateOrCreate(
            ['mahasiswa_id' => $mahasiswa->id],
            [
            'ipk_akhir' => $request->ipk_akhir,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status' => 'Sedang diproses' 
            ]
        );

        return redirect()->route('status-wisuda')->with('success', 'Pengajuan wisuda berhasil!');
        }
}