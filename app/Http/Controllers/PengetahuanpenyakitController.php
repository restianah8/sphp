<?php

namespace App\Http\Controllers;

use App\Models\Gejalapenyakit;
use App\Models\pengetahuanpenyakit;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengetahuanpenyakitController extends Controller
{
    public function index()
    {
        $pengetahuanpenyakit = pengetahuanpenyakit::all();
        $penyakit = Penyakit::all();
        $gejalapenyakit = Gejalapenyakit::all();
        return view('pengetahuanpenyakit.index', compact('pengetahuanpenyakit', 'penyakit', 'gejalapenyakit'));
    }

    /**::with('jenis_bencana', 'kabupaten', 'kecamatan', 'kelurahan')-;
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengetahuanpenyakit = pengetahuanpenyakit::all();
        $penyakit = Penyakit::all();
        $gejalapenyakit = Gejalapenyakit::all();
        return view('pengetahuanpenyakit/create', compact('penyakit', 'gejalapenyakit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('bobot', $request->bobot);
        $request->validate([
            'id_penyakit' => 'required',
            'id_gejalapenyakit' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required' => 'penyakit wajib di isi',
            'gejalapenyakit.required' => 'gejala wajib di isi',
            'bobot.required' => 'bobot wajib di isi',
        ]);

        $pengetahuanpenyakit = [
            'id_penyakit' => $request->input('id_penyakit'),
            'id_gejalapenyakit' => $request->input('id_gejalapenyakit'),
            'bobot' => $request->input('bobot'),

        ];

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');


        pengetahuanpenyakit::create($pengetahuanpenyakit);
        return redirect('pengetahuanpenyakit')->with('succses', 'berhasil memasukan data');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengetahuanpenyakit = pengetahuanpenyakit::where('id', $id)->first();
        return view('pengetahuanpenyakit/show')->with('pengetahuanpenyakit', $pengetahuanpenyakit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengetahuanpenyakit = pengetahuanpenyakit::findOrFail($id);
        $penyakit = Penyakit::orderBy('nama')->get();
        $gejalapenyakit = Gejalapenyakit::orderBy('nama')->get();

        return view('pengetahuanpenyakit/edit', compact('pengetahuanpenyakit', 'penyakit', 'gejalapenyakit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'id_gejalapenyakit' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required' => 'penyakit wajib di isi',
            'gejalapenyakit.required' => 'gejala wajib di isi',
            'bobot.required' => 'bobot wajib di isi',
        ]);

        $pengetahuanpenyakit = [
            'id_penyakit' => $request->input('id_penyakit'),
            'id_gejalapenyakit' => $request->input('id_gejalapenyakit'),
            'bobot' => $request->input('bobot'),

        ];


        pengetahuanpenyakit::where('id', $id)->update($pengetahuanpenyakit);
        return redirect('pengetahuanpenyakit')->with('succses', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengetahuanpenyakit::where('id', $id)->delete();
        return redirect('pengetahuanpenyakit')->with('succses', 'berhasil hapus data');
    }
}
