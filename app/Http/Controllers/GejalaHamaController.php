<?php

namespace App\Http\Controllers;

use App\Models\Gejalahama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class GejalaHamaController extends Controller
{
    public function index()
    {
        $gejalahama = Gejalahama::all();
        return view('gejalahama.index', compact('gejalahama'));
    }
    public function create()
    {
        return view('gejalahama.create');
    }
    public function store(Request $request)
    {

        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'gambarhama' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'kode' => 'kode wajib di isi',
            'nama.required' => 'nama wajib di isi',
            'gambarhama.required' => 'silakan masukan gambar',
            'gambarhama.mimes' => 'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
        ]);
        $gambarhama_file = $request->file('gambarhama');
        $gambarhama_ekstensi = $gambarhama_file->extension();
        $gambarhama_nama = date('ymdhis') . "." . $gambarhama_ekstensi;
        $gambarhama_file->move(public_path('gambarhama'), $gambarhama_nama);

        $gejalahama = [
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'gambar' => $gambarhama_nama
        ];
        Gejalahama::create($gejalahama);
        return redirect('gejalahama')->with('succses', 'berhasil memasukan data');
    }
    public function show($id)
    {
        $gejalahama = Gejalahama::where('id', $id)->first();
        return view('gejalahama/show')->with('gejalahama', $gejalahama);
    }


    public function edit(Gejalahama $gejalahama)
    {

        return view('gejalahama.edit', compact('gejalahama'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ], [
            'kode.required' => 'nama  wajib di isi',
            'nama.required' => 'nama  wajib di isi',
        ]);
        $gejalahama = [
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ];

        if ($request->hasFile('gambarhama')) {
            $request->validate([
                'gambarhama' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'gambarhama.mimes' => 'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
            ]);
            //sudah teropload di derektory
            $gambarhama_file = $request->file('gambarhama');
            $gambarhama_ekstensi = $gambarhama_file->extension();
            $gambarhama_nama = date('ymdhis') . "." . $gambarhama_ekstensi;
            $gambarhama_file->move(public_path('gambarhama'), $gambarhama_nama);

            $gejalahama_gambar = Gejalahama::where('id', $id)->first();
            File::delete(public_path('gambarhama') . '/' . $gejalahama_gambar->gambar);

            $gejalahama = [
                'gambar' => $gambarhama_nama
            ];
        }

        Gejalahama::where('id', $id)->update($gejalahama);
        return redirect('gejalahama')->with('succses', 'berhasil melakukan update data');
    }


    public function destroy($id)
    {
        $gejalahama = Gejalahama::where('id', $id)->first();
        File::delete(public_path('gambarhama') . '/' . $gejalahama->gambar);
        Gejalahama::where('id', $id)->delete();
        return redirect('gejalahama')->with('succses', 'berhasil hapus data');
    }
}
