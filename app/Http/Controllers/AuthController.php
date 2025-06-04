<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      public function register1(Request $request){
        $biodata = $request->validate([
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'], 
        ]);

        $request->session()->put('register.nama', $biodata['nama']);
        $request->session()->put('register.jenis_kelamin', $biodata['jenis_kelamin']);
        $request->session()->put('register.tanggal_lahir', $biodata['tanggal_lahir']);
        $request->session()->put('register.tempat_lahir', $biodata['tempat_lahir']);
        $request->session()->put('register.alamat', $biodata['alamat']);
        $request->session()->put('register.no_telp', $biodata['no_telp']);

        return redirect()->route('register.step2');
    }

    public function showRegister1(){
        return view('register.step1');
    }

    public function register2(Request $request){
        $akademik = $request->validate([
            'fakultas' => ['required'],
            'program_studi' => ['required'],
        ]);

        $request->session()->put('register.fakultas', $akademik['fakultas']);
        $request->session()->put('register.program_studi', $akademik['program_studi']);
        return redirect()->route('register.step3');
    }

    public function showRegister2(){
        return view('register.step2');
    }

    public function register3(Request $request){
        $data = [
            'nama' => session('register.nama'),
            'jenis_kelamin' => session('register.jenis_kelamin'),
            'tanggal_lahir' => session('register.tanggal_lahir'),
            'tempat_lahir' => session('register.tempat_lahir'),
            'alamat' => session('register.alamat'),
            'no_telp' => session('register.no_telp'),
            'fakultas' => session('register.fakultas'),
            'program_studi' => session('register.program_studi'),
        ];

        $mahasiswa = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'email' => $mahasiswa['email'],
            'password' => Hash::make($mahasiswa['password']),
            'role' => 'Mahasiswa',
        ]); 

        if($user && $user->id){
        Mahasiswa::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'fakultas' => $data['fakultas'],
            'program_studi' => $data['program_studi']
        ]);
      } else {
        return back()->with('error', 'User gagal dibuat');
      }

        return redirect()->route('login');
    }

    public function showRegister3(){
        return view('register.step3');
    }

    public function showLogin(){
       return view('login');
    }

    public function index(){
       $mahasiswa = Mahasiswa::find(1);
       return view('index',compact('mahasiswa'));
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('index');
        }
        else {
            return back()->withErrors([
                'email' => 'email tidak benar',
                'password' => 'password salah'
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homepage');
    }
}
