<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('homepage');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.create');

//Disini bagian route-route tanpa middleware (Bagian awal dari website kita)
//Taruh beberapa bagian route sebelum index.php ke sini guys;
Route::post('/register1', [AuthController::class, 'register1'])->name('register.step1.store');
Route::get('/register1', [AuthController::class, 'showRegister1'])->name('register.step1');
Route::post('/register2', [AuthController::class, 'register2'])->name('register.step2.store');
Route::get('/register2', [AuthController::class, 'showRegister2'])->name('register.step2');
Route::post('/register3', [AuthController::class, 'register3'])->name('register.step3.store');
Route::get('/register3', [AuthController::class, 'showRegister3'])->name('register.step3');
Route::get('/index', [AuthController::class,  'index'])->name('index');



