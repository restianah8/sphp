<?php

namespace App\Http\Controllers;

use App\Models\Penguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistrasiController extends Controller
{
    function index()
    {
        $penguna = Penguna::all();
        return view('register.index', compact('penguna'));
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('alamat', $request->alamat);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:penguna,email',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'name wajib di isi',
            'alamat.required' => 'alamat wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.email' => 'silahkan masukan email yang valid',
            'email.unique' => 'email sudah pernah di gunakan',
            'password.required' => 'password wajib di isi',
            'password.min' => 'minimum password yang di masukan 6 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ];
        $user = Penguna::create($data);

        if ($user) {
            return redirect('sesi')->with('success', 'berhasil register');
        } else {
            //gagal
            //return 'gagal';
            return redirect('/register')->withErrors('Username dan password yang di masukan tidak valid');
        }
    }
}
