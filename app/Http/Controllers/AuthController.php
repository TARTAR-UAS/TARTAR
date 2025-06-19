<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\Histori_Pendidikan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister1(Request $request){
    //Karena kita menyimpan info sesi yang lama supaya kalau pencet previous datanya ada
    //nanti waktu balik ke bagian login, lalu masuk ke register lagi malah masih ada datanya
    //sebenarnya gak apa-apa sih, cuman rasanya aneh aja, jadi make session beda untuk show nya lalu pake if
    if (!$request->session()->get('register.from_step2')) {
        $request->session()->forget('register'); //jadi kalau misalkan terdeteksi session bukan dari step2, maka data diforget
    }

    // Hapus flag sesi 2 biar tidak permanen di sana
    $request->session()->forget('register.from_step2');
    //Taruh session juga yang berbeda dengan step2 agar bisa forgot datanya.
    $request->session()->put('register.from_step1', true);
        return view('register.step1');
    }

    public function register1(Request $request){
        $biodata = $request->validate([
            'nama_depan' => ['required', 'max:255'],
            'nama_belakang' => ['required', 'max:255'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required','in:Islam,Kristen,Katolik,Buddha,Hindu,Konghucu'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'no_telp' => ['required', 'max:13'], 
        ]);

        //Pakai session untuk menyimpan data sementara, begitupula pada step2 selanjutnya
        $request->session()->put('register.nama_depan', $biodata['nama_depan']);
        $request->session()->put('register.nama_belakang', $biodata['nama_belakang']);
        $request->session()->put('register.jenis_kelamin', $biodata['jenis_kelamin']);
        $request->session()->put('register.agama', $biodata['agama']);
        $request->session()->put('register.tanggal_lahir', $biodata['tanggal_lahir']);
        $request->session()->put('register.tempat_lahir', $biodata['tempat_lahir']);
        $request->session()->put('register.alamat', $biodata['alamat']);
        $request->session()->put('register.no_telp', $biodata['no_telp']);
        return redirect()->route('register.step2');
    }

     public function showRegister2(Request $request){
        //Taruh sesi berbeda dari showRegister1 disini 
        $request->session()->put('register.from_step2', true);
        return view('register.step2');
    }


    public function register2(Request $request){
        $akademik = $request->validate([
            'nama_sekolah' => ['required', 'max:255'],
            'jenis_sekolah' => ['required','in:SMA,SMK,MA'],
            'jurusan' => ['required', 'max:255'],
            'tanggal_masuk' => ['required'],
            'tanggal_lulus' => ['required'],
            'lokasi_sekolah' => ['required', 'max:255'],
            'nilai_akhir' => ['required', 'numeric', 'between:0,100'],
        ]);

        $request->session()->put('register.nama_sekolah', $akademik['nama_sekolah']);
        $request->session()->put('register.jenis_sekolah', $akademik['jenis_sekolah']);
        $request->session()->put('register.jurusan', $akademik['jurusan']);
        $request->session()->put('register.tanggal_masuk', $akademik['tanggal_masuk']);
        $request->session()->put('register.tanggal_lulus', $akademik['tanggal_lulus']);
        $request->session()->put('register.lokasi_sekolah', $akademik['lokasi_sekolah']);
        $request->session()->put('register.nilai_akhir', $akademik['nilai_akhir']);

        return redirect()->route('register.step3');
    }


    public function showRegister3(){
        return view('register.step3');
    }

    public function register3(Request $request){
        $orangtua = $request->validate([
            'nama_ayah' => ['required', 'max:255'],
            'pekerjaan_ayah' => ['required', 'max:255'],
            'no_telp_ayah' => ['required', 'max:13'],
            'nama_ibu' => ['required', 'max:255'],
            'pekerjaan_ibu' => ['required', 'max:255'],
            'no_telp_ibu' => ['required', 'max:13'],

        ]);

        $request->session()->put('register.nama_ayah', $orangtua['nama_ayah']);
        $request->session()->put('register.pekerjaan_ayah', $orangtua['pekerjaan_ayah']);
        $request->session()->put('register.no_telp_ayah', $orangtua['no_telp_ayah']);
        $request->session()->put('register.nama_ibu', $orangtua['nama_ibu']);
        $request->session()->put('register.pekerjaan_ibu', $orangtua['pekerjaan_ibu']);
        $request->session()->put('register.no_telp_ibu', $orangtua['no_telp_ibu']);

        return redirect()->route('register.step4');
    }

     public function showRegister4(){
        return view('register.step4');
    }

    public function register4(Request $request){
        $akademik = $request->validate([
            'fakultas' => ['required'],
            'program_studi' => ['required'],
        ]);

        $request->session()->put('register.fakultas', $akademik['fakultas']);
        $request->session()->put('register.program_studi', $akademik['program_studi']);
        return redirect()->route('register.step5');
    }

    public function showRegister5(){
        return view('register.step5');
    }

    public function register5(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $request->session()->put('register.email', $validated['email']);
        $request->session()->put('register.password', $validated['password']);
        return redirect()->route('register.confirm');
    }

    public function showConfirmation(){
        return view('register.confirmation');
    }

    public function confirmData(Request $request){
         $data = [
            'nama_depan' => session('register.nama_depan'),
            'nama_belakang' => session('register.nama_belakang'),
            'jenis_kelamin' => session('register.jenis_kelamin'),
            'agama' => session('register.agama'),
            'tanggal_lahir' => session('register.tanggal_lahir'),
            'tempat_lahir' => session('register.tempat_lahir'),
            'alamat' => session('register.alamat'),
            'no_telp' => session('register.no_telp'),
            'nama_sekolah' => session('register.nama_sekolah'), 
            'jenis_sekolah' => session('register.jenis_sekolah'),
            'jurusan' => session('register.jurusan'),
            'tanggal_masuk' => session('register.tanggal_masuk'),
            'tanggal_lulus' => session('register.tanggal_lulus') ,
            'lokasi_sekolah' => session('register.lokasi_sekolah'),
            'nilai_akhir' => session('register.nilai_akhir'), 
            'nama_ayah' => session('register.nama_ayah'),  
            'pekerjaan_ayah' => session('register.pekerjaan_ayah'), 
            'no_telp_ayah' => session('register.no_telp_ayah'),
            'nama_ibu' => session('register.nama_ibu'), 
            'pekerjaan_ibu' => session('register.pekerjaan_ibu'),
            'no_telp_ibu' => session('register.no_telp_ibu'), 
            'fakultas' => session('register.fakultas'),
            'program_studi' => session('register.program_studi'), 
            'email' => session('register.email'),
            'password' => session('register.password')
        ];

         $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'Mahasiswa',
        ]); 

        //Melakukan pengecekan ke user, karena mahasiswa punya foreign key user
        if($user && $user->id){
          $mahasiswa = Mahasiswa::create([
            'user_id' => $user->id,
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'fakultas' => $data['fakultas'],
            'program_studi' => $data['program_studi'], 
          ]);
          //Melakukan pengecekan ke mahasiswa, karena histori pendidikan dan orantua punya foreign key mahasiswa
           if($mahasiswa && $mahasiswa->id)
           {
              Histori_Pendidikan::create([
                  'mahasiswa_id' => $mahasiswa->id, 
                  'nama_sekolah' => $data['nama_sekolah'],
                  'jenis_sekolah' => $data['jenis_sekolah'],
                  'jurusan' => $data['jurusan'],
                  'tanggal_masuk' => $data['tanggal_masuk'],
                  'tanggal_lulus' => $data['tanggal_lulus'],
                  'lokasi_sekolah' => $data['lokasi_sekolah'],
                  'nilai_akhir' => $data['nilai_akhir'],
              ]);

              Orangtua::create([
                'mahasiswa_id' => $mahasiswa->id, 
                'nama_ayah' => $data['nama_ayah'],
                'pekerjaan_ayah' => $data['pekerjaan_ayah'],
                'no_telp_ayah' => $data['no_telp_ayah'],
                'nama_ibu' => $data['nama_ibu'],
                'pekerjaan_ibu' => $data['pekerjaan_ibu'],
                'no_telp_ibu' => $data['no_telp_ibu'],
              ]);
            }
        } else {
         return back()->with('error', 'User gagal dibuat');
        }
        $request->session()->forget('register');
        return redirect()->route('login');
    }

    public function showLogin(){
       return view('login');
    }

    public function showAdminLogin(){
        return view('admin-login');
    }

    public function index(){
        //Memanggil user juga, untuk memastikan saat login, data pada user sesuai dengan data user tersebut di tabel lain
       $user = Auth::user(); 
       $mahasiswa = $user->mahasiswa; 
       return view('index',compact('mahasiswa'));
    }

    public function adminIndex(){
       $mahasiswaPending = Mahasiswa::where('status_akun', 'pending')->count();
       return view('admin-index', compact('mahasiswaPending'));
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($validated)){
            $user = Auth::user();
            if ($user->role !== 'Mahasiswa') {
                Auth::logout();
                return back()->withErrors(['Anda bukan mahasiswa.']);
            }

            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

            if($mahasiswa->status_akun === 'Pending'){
                Auth::logout();
                return back()->withErrors(['Akun anda belum diverifikasi oleh admin.']);
            } else if ($mahasiswa->status_akun === 'Rejected') {
                Auth::logout();
                return back()->withErrors(['Akun anda telah ditolak oleh admin, hubungi pihak berkenan untuk konsultasi!']);
            }
            $request->session()->regenerate();
            return redirect()->route('index');
        }
        else {
            return back()->withErrors([
                'login' => 'email atau password tidak benar',
            ]);
        }
    }

    public function adminLogin(Request $request){
         $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($validated)){
            $user = Auth::user();
            if ($user->role !== 'Admin') {
            Auth::logout();
            return back()->withErrors(['Anda bukan admin.']);
            }
            $request->session()->regenerate();
            return redirect()->route('admin-index');
        }
        else {
            return back()->withErrors([
                'login' => 'email atau password tidak benar',
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
