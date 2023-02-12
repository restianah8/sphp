<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Identifikasi;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        return view('layout.template');
    }
    public function dashboard()
    {

        //    $riwayat =Riwayat::groupBy('created_at')->orderBy('created_at', 'desc')->get();
        $riwayat = Identifikasi::with('gejala', 'gejalahama', 'gejalapenyakit')->latest()->get();

        return view('dashboard', [
            "riwayat" => $riwayat,
        ]);
    }

    public function riwayat()
    {
    }
}
