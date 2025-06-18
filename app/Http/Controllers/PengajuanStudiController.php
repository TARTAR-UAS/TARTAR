<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\PengajuanStudi;


class PengajuanStudiController extends Controller
{
    public function create()
    {
        $mataKuliah = MataKuliah::all();
        return view('pengajuan-studi', compact('mataKuliah'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|array|min:3|max:5',
        ]);

        $totalSKS = MataKuliah::whereIn('id', $validated['mata_kuliah'])->sum('sks');
        if ($totalSKS > 20) {
            return back()->with('error', 'Total SKS melebihi 20');
        }

        $pengajuan = PengajuanStudi::create([
            'mahasiswa_id' => auth()->user()->mahasiswa->id,
            'biaya' => count($validated['mata_kuliah']) * 2000000,
            'status' => 'pending',
        ]);

        $pengajuan->mataKuliah()->attach($validated['mata_kuliah']);

        return redirect()->route('pengajuan-studi')->with('success', 'Pengajuan studi berhasil dikirim.');
    }
}
