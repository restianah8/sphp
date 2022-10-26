<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SesionController extends Controller
{
    function index()
    {
        return view("sesi.index");
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email wajib di isi',
            'password.required' =>'password wajib di isi'
        ]);
        $infologin = [
            'email' => $request ->email,
            'password' => $request ->password,
        ];
        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect('/.tem');
            }
        }else{
            //gagal
            //return 'gagal';
            return redirect('sesi')->withErrors('Username dan password yang di masukan tidak valid');
        }
    }

    function logout (){
        Auth::logout();
        return redirect('/')->with('success','berhasil logout');
    }
}
