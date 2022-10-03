<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class IdentifikasiController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
    return view('identifikasi/index',compact('gejala'));
    }
}
