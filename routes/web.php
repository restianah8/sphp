<?php

use App\Http\Controllers\DataPengunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PengunaHomeController;
use App\Http\Controllers\PengunaInfoController;
use App\Http\Controllers\PengunaPengetahuanController;
use App\Http\Controllers\PengunaRegisterController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PublikHomeController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SesionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('/', [PublikHomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
 
  Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
});
  //gejala
  Route::get('gejala',[GejalaController::class,'index']);
  Route::get('gejala/tambah', [GejalaController::class, 'create']);
  Route::post('gejala/simpan', [GejalaController::class, 'store'])->name('gejala.simpan');
  Route::get('gejala/edit/{gejala}', [GejalaController::class, 'edit']);
  Route::put('gejala/update/{gejala}', [GejalaController::class, 'update'])->name('gejala.update');
  Route::get('gejala/hapus/{gejala}', [GejalaController::class, 'destroy']);

  //penyakit
  Route::resource('penyakit',PenyakitController::class);

  //pengetahuan
  Route::resource('pengetahuan',PengetahuanController::class);

  //infopenguna
  Route::resource('pengunainfo',PengunaInfoController::class);

  Route::resource('pengunpengetahuan',PengunaPengetahuanController::class);
  Route::resource('datapenguna',DataPengunaController::class);


//login
Route::get('/sesi',[SesionController::class, 'index']);
Route::post('/sesi/login',[SesionController::class, 'login']);
Route::get('/sesi/logout',[SesionController::class, 'logout']);
Route::get('/register',[RegistrasiController::class, 'index']);
Route::get('/forgot',[PengunaRegisterController::class, 'forgot']);
Route::post('/regis',[RegistrasiController::class, 'create']);



Route::get('/.das', [PengunaHomeController::class, 'dashboards'])->name('dashboards');