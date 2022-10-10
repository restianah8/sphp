<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class IdentifikasiPengunaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
    return view('identifikasipenguna/index',compact('gejala'));
    }

    public function result ()
    {
        return view('identifikasipenguna/result');
    }
}
