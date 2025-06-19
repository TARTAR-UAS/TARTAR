<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengajuanStudiController;
use App\Http\Controllers\WisudaController;
use App\Http\Controllers\AkademikController;

use function Pest\Laravel\put;

Route::get('/', function(){
    return view('homepage');
})->name('homepage');

Route::controller(AuthController::class)->group(function() {
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','login')->name('login.create');
    Route::post('/logout','logout')->name('logout');
    Route::post('/register1','register1')->name('register.step1.store');
    Route::get('/register1','showRegister1')->name('register.step1');
    Route::post('/register2','register2')->name('register.step2.store');
    Route::get('/register2','showRegister2')->name('register.step2');
    Route::post('/register3','register3')->name('register.step3.store');
    Route::get('/register3','showRegister3')->name('register.step3');
    Route::post('/register4','register4')->name('register.step4.store');
    Route::get('/register4','showRegister4')->name('register.step4');
    Route::post('/register5','register5')->name('register.step5.store');
    Route::get('/register5','showRegister5')->name('register.step5');
    Route::post('/confirmation', 'confirmData')->name('register.confirm.store');
    Route::get('/confirmation', 'showConfirmation')->name('register.confirm');
    Route::get('/index', 'index')->name('index');
    Route::get('/admin/login', 'showAdminLogin')->name('admin-login');
    Route::post('/admin/login', 'adminLogin')->name('admin-login.create');
    Route::get('/admin/index', 'adminIndex')->name('admin-index');
});

//Disini bagian route-route tanpa middleware (Bagian awal dari website kita)
//Taruh beberapa bagian route sebelum index.php ke sini guys;


Route::get('/pembayaran',[MahasiswaController::class, 'showPembayaran'])->name('pembayaran');

Route::get('/biodata', [MahasiswaController::class, 'biodata'])->name('biodata');
Route::match(['get', 'post', 'put'], '/admin/index/biodata-admin', [MahasiswaController::class, 'biodataAdmin'])->name('biodata-admin');
Route::get('/lengkapi-data', [MahasiswaController::class, 'lengkapiData'])->name('lengkapi-data');
Route::match(['get', 'post', 'put'], 'updateData', [MahasiswaController::class, 'updateData'])->name('lengkapi-data-update');
Route::match(['get', 'post'], '/ubah-password', [MahasiswaController::class, 'ubahPassword'])->name('ubah-password');
Route::match(['get', 'post'], '/lengkapi-data-ortu', [MahasiswaController::class, 'ubahDataOrangtua'])->name('lengkapi-data-orangtua');
Route::post('/update-data-ortu', [MahasiswaController::class, 'updateDataOrangtua'])->name('update-data-orangtua');
Route::get('/lengkapi-data-pendidikan', [MahasiswaController::class, 'ubahDataPendidikan'])->name('lengkapi-data-pendidikan');
Route::match(['post', 'put'], '/update-data-pendidikan', [MahasiswaController::class, 'updateDataPendidikan'])->name('update-data-pendidikan');


Route::get('/edit-biodata', [MahasiswaController::class, 'editBiodata'])->name('editBiodata');
Route::get('/ajukan', [MahasiswaController::class, 'pilihKategori'])->name('pilih-kategori');
Route::get('/ajukan/{kategori}', [MahasiswaController::class, 'formPengajuan'])->name('form-ajukan');
Route::post('/ajukan/mahasiswa', [MahasiswaController::class, 'ajukanPerubahanBiodata'])->name('form-pengubahan-mahasiswa');
Route::post('/ajukan/orangtua', [MahasiswaController::class, 'ajukanPerubahanOrangtua'])->name('form-pengubahan-orangtua');
Route::post('/ajukan/pendidikan', [MahasiswaController::class, 'ajukanPerubahanPendidikan'])->name('form-pengubahan-pendidikan');
Route::get('/akademik', [MahasiswaController::class, 'showAkademik'])->name('akademik');

Route::get('/pengajuan-studi', [PengajuanStudiController::class, 'create'])->name('pengajuan-studi');
Route::post('/pengajuan-studi', [PengajuanStudiController::class, 'store'])->name('pengajuan-studi.store');

Route::get('/edit-biodata', [AdminController::class, 'layoutAdmin'])->name('layout-admin');
Route::get('/admin/permintaan-biodata', [AdminController::class, 'listPermintaanBiodata'])->name('permintaan-biodata');
Route::post('/admin/permintaan-biodata/setujui/{id}', [AdminController::class, 'setujuiPermintaan'])->name('terima-perubahan');
Route::post('/admin/permintaan-biodata/tolak/{id}', [AdminController::class, 'tolakPermintaan'])->name('tolak-perubahan');
Route::get('/admin/pembayaran', [AdminController::class, 'listPembayaran'])->name('list-pembayaran');
Route::post('/admin/pembayaran/{id}/ubah-status', [AdminController::class, 'ubahStatusPembayaran'])->name('ubah-status-pembayaran');
Route::get('/admin/manajemen-akun', [AdminController::class, 'showManajemenAkun'])->name('manajemen-akun');
Route::post('/admin/manajemen-akun/terima/{id}', [AdminController::class, 'terimaVerifikasi'])->name('terima-verifikasi');
Route::post('/admin/manajemen-akun/tolak/{id}', [AdminController::class, 'tolakVerifikasi'])->name('tolak-verifikasi');

Route::get('/admin/pengajuan-studi', [AdminController::class, 'listPengajuanStudi'])->name('pengajuan-studi-admin');
Route::post('/admin/pengajuan-studi/setujui/{id}', [AdminController::class, 'setujuiPengajuanStudi'])->name('setujui-pengajuan-studi');
Route::post('/admin/pengajuan-studi/tolak/{id}', [AdminController::class, 'tolakPengajuanStudi'])->name('tolak-pengajuan-studi');


Route::get('/pengumuman', [PengumumanController::class, 'index']) ->name('pengumuman');
Route::get('/admin/pengumuman', [AdminController::class, 'pengumumanAdmin']) ->name('pengumuman-admin');
Route::get('/admin/pengumuman/create', [AdminController::class, 'pengumumanCreate'])->name('pengumuman-create');
Route::post('/admin/pengumuman', [AdminController::class, 'pengumumanStore']) ->name('pengumuman-store');
Route::get('/admin/pengumuman/edit/{id}', [AdminController::class, 'pengumumanEdit'])->name('pengumuman-edit');
Route::put('/admin/pengumuman/{id}', [AdminController::class, 'pengumumanUpdate'])->name('pengumuman-update');
Route::delete('/admin/pengumuman/{id}', [AdminController::class, 'pengumumanDelete']) ->name('pengumuman-delete');

Route::get('/akademik/histori', [AkademikController::class, 'histori'])->name('akademik.histori');
Route::get('/akademik/jadwal', [AkademikController::class, 'jadwal'])->name('akademik.jadwal');
Route::get('/akademik/status-kuliah', [AkademikController::class, 'statusKuliah'])->name('akademik.status-kuliah');


Route::get('/admin/wisuda', [WisudaController::class, 'listPengajuan'])->name('admin-wisuda-index');
Route::post('/admin/wisuda/{id}', [WisudaController::class, 'updatePengajuan'])->name('admin-wisuda-update');
Route::get('/mahasiswa/status-wisuda', [WisudaController::class, 'showStatus'])->name('status-wisuda');
Route::get('/mahasiswa/pengajuan-wisuda', [WisudaController::class, 'showWisudaForm'])->name('form-wisuda');
Route::post('/mahasiswa/pengajuan-wisuda', [WisudaController::class, 'wisudaForm'])->name('form-wisuda-store');