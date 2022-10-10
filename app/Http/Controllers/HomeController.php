<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
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
       $gejala= Gejala::all()->count();
       

        return view('dashboard')->with( 'gejala', $gejala) ;
        
    }

    public function riwayat(){
   
    }
}
