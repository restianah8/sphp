<?php

namespace App\Http\Controllers;

use App\Models\Gejalapenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GejalaPenyakitController extends Controller
{
    public function index()
    {
        $gejalapenyakit = Gejalapenyakit::all();
        return view('gejalapenyakit.index', compact('gejalapenyakit'));
    }
    public function create()
    {
        return view('gejalapenyakit.create');
    }
    public function store(Request $request)
    {

        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'gambarpenyakit' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'kode' => 'kode wajib di isi',
            'nama.required' => 'nama wajib di isi',
            'gambarpenyakit.required' => 'silakan masukan gambar',
            'gambarpenyakit.mimes' => 'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
        ]);
        $gambarpenyakit_file = $request->file('gambarpenyakit');
        $gambarpenyakit_ekstensi = $gambarpenyakit_file->extension();
        $gambarpenyakit_nama = date('ymdhis') . "." . $gambarpenyakit_ekstensi;
        $gambarpenyakit_file->move(public_path('gambarpenyakit'), $gambarpenyakit_nama);

        $gejalapenyakit = [
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'gambar' => $gambarpenyakit_nama
        ];
        Gejalapenyakit::create($gejalapenyakit);
        return redirect('gejalapenyakit')->with('succses', 'berhasil memasukan data');
    }
    public function show($id)
    {
        $gejalapenyakit = Gejalapenyakit::where('id', $id)->first();
        return view('gejalapenyakit/show')->with('gejalapenyakit', $gejalapenyakit);
    }


    public function edit(Gejalapenyakit $gejalapenyakit)
    {

        return view('gejalapenyakit.edit', compact('gejalapenyakit'));
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
        $gejalapenyakit = [
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ];

        if ($request->hasFile('gambarpenyakit')) {
            $request->validate([
                'gambarpenyakit' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'gambarpenyakit.mimes' => 'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
            ]);
            //sudah teropload di derektory
            $gambarpenyakit_file = $request->file('gambarpenyakit');
            $gambarpenyakit_ekstensi = $gambarpenyakit_file->extension();
            $gambarpenyakit_nama = date('ymdhis') . "." . $gambarpenyakit_ekstensi;
            $gambarpenyakit_file->move(public_path('gambarpenyakit'), $gambarpenyakit_nama);

            $gejalapenyakit_gambar = Gejalapenyakit::where('id', $id)->first();
            File::delete(public_path('gambarpenyakit') . '/' . $gejalapenyakit_gambar->gambar);

            $gejalapenyakit = [
                'gambar' => $gambarpenyakit_nama
            ];
        }

        Gejalapenyakit::where('id', $id)->update($gejalapenyakit);
        return redirect('gejalapenyakit')->with('succses', 'berhasil melakukan update data');
    }


    public function destroy($id)
    {
        $gejalapenyakit = Gejalapenyakit::where('id', $id)->first();
        File::delete(public_path('gambarpenyakit') . '/' . $gejalapenyakit->gambar);
        Gejalapenyakit::where('id', $id)->delete();
        return redirect('gejalapenyakit')->with('succses', 'berhasil hapus data');
    }
}
