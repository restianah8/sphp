<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('layout.template');
    }
    public function dashboard()
    {
    //    $penyakit= Penyakit::all()->count();
    //    $gejala= Gejala::all()->count();
       $riwayat= Riwayat::all();

        return view('dashboard',compact('riwayat') ) ;
        
    }

    public function riwayat(){
   
    }
}
