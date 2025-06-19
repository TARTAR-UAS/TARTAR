<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WisudaController extends Controller
{
    // Menampilkan form untuk admin menulis status wisuda
    public function showForm()
    {
        return view('admin.status-wisuda');
    }

    // Menyimpan atau memperbarui status wisuda mahasiswa
    public function storeStatus(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $request->validate([
            'status' => 'required|string',
        ]);

        Wisuda::updateOrCreate(
            ['mahasiswa_id' => $mahasiswa->id],
            ['status' => $request->status]
        );

        return redirect()->back()->with('success', 'Status wisuda berhasil diperbarui!');
    }

    // Menampilkan status wisuda berdasarkan ID mahasiswa
    public function showStatus()
    {
        $user = Auth::user(); 
        $mahasiswa = $user->mahasiswa;
        //$status = Wisuda::where('id', $mahasiswa_id)->first();
        return view('status-wisuda', compact('mahasiswa'));
    }
}