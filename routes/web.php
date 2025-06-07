<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('homepage');
})->name('homepage');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.create');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Disini bagian route-route tanpa middleware (Bagian awal dari website kita)
//Taruh beberapa bagian route sebelum index.php ke sini guys;
Route::post('/register1', [AuthController::class, 'register1'])->name('register.step1.store');
Route::get('/register1', [AuthController::class, 'showRegister1'])->name('register.step1');
Route::post('/register2', [AuthController::class, 'register2'])->name('register.step2.store');
Route::get('/register2', [AuthController::class, 'showRegister2'])->name('register.step2');
Route::post('/register3', [AuthController::class, 'register3'])->name('register.step3.store');
Route::get('/register3', [AuthController::class, 'showRegister3'])->name('register.step3');
Route::get('/index', [AuthController::class,  'index'])->name('index');

Route::get('/pembayaran',[MahasiswaController::class, 'showPembayaran'])->name('pembayaran');

Route::get('/biodata', [MahasiswaController::class, 'biodata']);
Route::get('/lengkapi-data', [MahasiswaController::class, 'lengkapiData']);
Route::post('/lengkapi-data', [MahasiswaController::class, 'updateData']);
Route::get('/ubah-no-hp', [MahasiswaController::class, 'ubahNoHp']);
Route::post('/ubah-no-hp', [MahasiswaController::class, 'updateNoHp']);
Route::get('/ubah-password', [MahasiswaController::class, 'ubahPassword']);
Route::post('/ubah-password', [MahasiswaController::class, 'updatePassword']);