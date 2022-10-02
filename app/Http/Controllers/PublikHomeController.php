<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublikHomeController extends Controller
{
    public function index()
    {
      
        return view('home');
    }

}
