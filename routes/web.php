<?php

use App\Http\Controllers\DataPengunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\GejalaHamaController;
use App\Http\Controllers\GejalaPenyakitController;
use App\Http\Controllers\IdentifikasiController;
use App\Http\Controllers\identifikasihamap;
use App\Http\Controllers\IdentifikasiPengunaController;
use App\Http\Controllers\identifikasipenyakitp;
use App\Http\Controllers\IdentifikasiUtamaController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PengetahuanhamaController;
use App\Http\Controllers\PengetahuanpenyakitController;
use App\Http\Controllers\PengunaHomeController;
use App\Http\Controllers\PengunaInfoController;
use App\Http\Controllers\PengunaPengetahuanController;
use App\Http\Controllers\PengunaRegisterController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PublikHomeController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RiwayatPController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TentangController;

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
Route::get('gejala', [GejalaController::class, 'index'])->middleware('islogin');
Route::get('gejala/tambah', [GejalaController::class, 'create'])->middleware('islogin');
Route::post('gejala/simpan', [GejalaController::class, 'store'])->name('gejala.simpan')->middleware('islogin');
Route::get('gejala/edit/{gejala}', [GejalaController::class, 'edit'])->middleware('islogin');
Route::put('gejala/update/{gejala}', [GejalaController::class, 'update'])->name('gejala.update')->middleware('islogin');
Route::get('gejala/hapus/{gejala}', [GejalaController::class, 'destroy'])->middleware('islogin');
Route::get('/gejala/show/{gejala}', [GejalaController::class, 'show'])->name('gejala.show')->middleware('islogin');

//gejalahama
Route::get('gejalahama', [GejalaHamaController::class, 'index'])->middleware('islogin');
Route::get('gejalahama/tambah', [GejalahamaController::class, 'create'])->middleware('islogin');
Route::post('gejalahama/simpan', [GejalahamaController::class, 'store'])->name('gejalahama.simpan')->middleware('islogin');
Route::get('gejalahama/edit/{gejalahama}', [GejalahamaController::class, 'edit'])->middleware('islogin');
Route::put('gejalahama/update/{gejalahama}', [GejalahamaController::class, 'update'])->name('gejalahama.update')->middleware('islogin');
Route::get('gejalahama/hapus/{gejalahama}', [GejalahamaController::class, 'destroy'])->middleware('islogin');
Route::get('/gejalahama/show/{gejalahama}', [GejalahamaController::class, 'show'])->name('gejalahama.show')->middleware('islogin');

//gejalapenyakit
Route::get('gejalapenyakit', [GejalaPenyakitController::class, 'index'])->middleware('islogin');
Route::get('gejalapenyakit/tambah', [GejalaPenyakitController::class, 'create'])->middleware('islogin');
Route::post('gejalapenyakit/simpan', [GejalaPenyakitController::class, 'store'])->name('gejalapenyakit.simpan')->middleware('islogin');
Route::get('gejalapenyakit/edit/{gejalapenyakit}', [GejalaPenyakitController::class, 'edit'])->middleware('islogin');
Route::put('gejalapenyakit/update/{gejalapenyakit}', [GejalaPenyakitController::class, 'update'])->name('gejalapenyakit.update')->middleware('islogin');
Route::get('gejalapenyakit/hapus/{gejalapenyakit}', [GejalaPenyakitController::class, 'destroy'])->middleware('islogin');
Route::get('/gejalapenyakit/show/{gejalapenyakit}', [GejalaPenyakitController::class, 'show'])->name('gejalapenyakit.show')->middleware('islogin');

//penyakit
Route::get('/penyakit/hapus-foto/{penyakit}/{i}', [PenyakitController::class, 'hapusFoto'])->name('penyakit.hapusFoto')->middleware('islogin');
Route::resource('penyakit', PenyakitController::class)->middleware('islogin');

//pengetahuan
Route::get('pengetahuan', [PengetahuanController::class, 'index'])->middleware('islogin');
Route::get('pengetahuan/tambah', [PengetahuanController::class, 'create'])->middleware('islogin');
Route::post('pengetahuan/simpan', [PengetahuanController::class, 'store'])->name('pengetahuan.simpan')->middleware('islogin');
Route::get('pengetahuan/edit/{pengetahuan}', [PengetahuanController::class, 'edit'])->middleware('islogin');
Route::put('pengetahuan/update/{pengetahuan}', [PengetahuanController::class, 'update'])->name('pengetahuan.update')->middleware('islogin');
Route::get('pengetahuan/hapus/{pengetahuan}', [PengetahuanController::class, 'destroy'])->middleware('islogin');
Route::get('/pengetahuan/show/{pengetahuan}', [PengetahuanController::class, 'show'])->name('pengetahuan.show')->middleware('islogin');

//pengetahuanhama
Route::get('pengetahuanhama', [PengetahuanhamaController::class, 'index'])->middleware('islogin');
Route::get('pengetahuanhama/tambah', [PengetahuanhamaController::class, 'create'])->middleware('islogin');
Route::post('pengetahuanhama/simpan', [PengetahuanhamaController::class, 'store'])->name('pengetahuanhama.simpan')->middleware('islogin');
Route::get('pengetahuanhama/edit/{pengetahuanhama}', [PengetahuanhamaController::class, 'edit'])->middleware('islogin');
Route::put('pengetahuanhama/update/{pengetahuanhama}', [PengetahuanhamaController::class, 'update'])->name('pengetahuanhama.update')->middleware('islogin');
Route::get('pengetahuanhama/hapus/{pengetahuanhama}', [PengetahuanhamaController::class, 'destroy'])->middleware('islogin');
Route::get('/pengetahuanhama/show/{pengetahuanhama}', [PengetahuanhamaController::class, 'show'])->name('pengetahuanhama.show')->middleware('islogin');

//pengetahuanpenyakit
Route::get('pengetahuanpenyakit', [PengetahuanpenyakitController::class, 'index'])->middleware('islogin');
Route::get('pengetahuanpenyakit/tambah', [PengetahuanpenyakitController::class, 'create'])->middleware('islogin');
Route::post('pengetahuanpenyakit/simpan', [PengetahuanpenyakitController::class, 'store'])->name('pengetahuanpenyakit.simpan')->middleware('islogin');
Route::get('pengetahuanpenyakit/edit/{pengetahuanpenyakit}', [PengetahuanpenyakitController::class, 'edit'])->middleware('islogin');
Route::put('pengetahuanpenyakit/update/{pengetahuanpenyakit}', [PengetahuanpenyakitController::class, 'update'])->name('pengetahuanpenyakit.update')->middleware('islogin');
Route::get('pengetahuanpenyakit/hapus/{pengetahuanpenyakit}', [PengetahuanpenyakitController::class, 'destroy'])->middleware('islogin');
Route::get('/pengetahuanpenyakit/show/{pengetahuanpenyakit}', [PengetahuanpenyakitController::class, 'show'])->name('pengetahuanpenyakit.show')->middleware('islogin');

//infopenguna
Route::resource('pengunainfo', PengunaInfoController::class)->middleware('islogin');

Route::resource('pengunpengetahuan', PengunaPengetahuanController::class)->middleware('islogin');

//data penguna
Route::get('datapenguna', [DataPengunaController::class, 'index'])->middleware('islogin');
Route::get('datapenguna/hapus/{datapenguna}', [DataPengunaController::class, 'destroy'])->middleware('islogin');

//tentang sistem penguna
Route::get('/tentang', [TentangController::class, 'index'])->middleware('islogin');


//identifikasi
Route::get('identifikasi', [IdentifikasiController::class, 'index'])->middleware('islogin')->name('identifikasi.index');
Route::post('/identifikasi/result', [IdentifikasiController::class, 'result'])->middleware('islogin');
Route::post('/identifikasi/proses', [IdentifikasiController::class, 'proses'])->middleware('islogin');

//identifikasiumum
Route::get('identifikasiutama', [IdentifikasiUtamaController::class, 'index'])->middleware('islogin');

//identifikasihamap
Route::get('identifikasihamap', [identifikasihamap::class, 'index'])->middleware('islogin');
Route::post('/identifikasihamap/result', [identifikasihamap::class, 'result'])->middleware('islogin');

//identifikasipenyakitp
Route::get('identifikasipenyakitp', [identifikasipenyakitp::class, 'index'])->middleware('islogin');
Route::post('/identifikasipenyakitp/result', [identifikasipenyakitp::class, 'result'])->middleware('islogin');

//indentifikasipenguna
Route::get('identifikasipenguna', [IdentifikasiPengunaController::class, 'index'])->middleware('islogin');
Route::post('/identifikasipenguna/result', [IdentifikasiPengunaController::class, 'result']);
Route::post('/identifikasipenguna/proses', [IdentifikasiPengunaController::class, 'proses'])->middleware('islogin');

Route::get('riwayatpenguna', [RiwayatPController::class, 'index'])->middleware('islogin');
Route::get('/Riwayat/show/{idp}/{tgl}', [RiwayatPController::class, 'show'])->name('Riwayat.show')->middleware('islogin');
Route::get('riwayat/hapus/{identifikasi}', [RiwayatController::class, 'destroy'])->middleware('islogin')->name('riwayatA.hapus');
Route::get('/riwayatA/show/{idp}/{tgl}', [RiwayatController::class, 'show'])->name('riwayatA.show')->middleware('islogin');
Route::get('/riwayatA/hasil/{identifikasi}', [RiwayatController::class, 'hasil'])->name('riwayatA.hasil')->middleware('islogin');




//login
Route::get('/sesi', [SesionController::class, 'index']);
Route::post('/sesi/login', [SesionController::class, 'login']);
Route::get('/sesi/logout', [SesionController::class, 'logout']);
Route::get('/register', [RegistrasiController::class, 'index']);

Route::post('/regis', [RegistrasiController::class, 'create']);





Route::get('/.tem', [TemplateController::class, 'template'])->name('template')->middleware('islogin')->middleware('islogin');
