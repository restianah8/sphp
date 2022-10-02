<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunaHomeController extends Controller
{
    public function index()
    {

        return view('layouts.template');
    }

    public function dashboards()
    {
        return view('penguna.dashboard');
        
    }
}
