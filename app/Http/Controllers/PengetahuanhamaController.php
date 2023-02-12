<?php

namespace App\Http\Controllers;

use App\Models\Gejalahama;
use App\Models\pengetahuanhama;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengetahuanhamaController extends Controller
{
    public function index()
    {
        $pengetahuanhama = pengetahuanhama::all();
        $penyakit = Penyakit::all();
        $gejalahama = Gejalahama::all();
        return view('pengetahuanhama.index', compact('pengetahuanhama', 'penyakit', 'gejalahama'));
    }

    /**::with('jenis_bencana', 'kabupaten', 'kecamatan', 'kelurahan')-;
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengetahuanhama = pengetahuanhama::all();
        $penyakit = Penyakit::all();
        $gejalahama = Gejalahama::all();
        return view('pengetahuanhama/create', compact('penyakit', 'gejalahama'));
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
            'id_gejalahama' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required' => 'penyakit wajib di isi',
            'gejalahama.required' => 'gejala wajib di isi',
            'bobot.required' => 'bobot wajib di isi',
        ]);

        $pengetahuanhama = [
            'id_penyakit' => $request->input('id_penyakit'),
            'id_gejalahama' => $request->input('id_gejalahama'),
            'bobot' => $request->input('bobot'),

        ];

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');


        pengetahuanhama::create($pengetahuanhama);
        return redirect('pengetahuanhama')->with('succses', 'berhasil memasukan data');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengetahuanhama = pengetahuanhama::where('id', $id)->first();
        return view('pengetahuanhama/show')->with('pengetahuanhama', $pengetahuanhama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengetahuanhama = pengetahuanhama::findOrFail($id);
        $penyakit = Penyakit::orderBy('nama')->get();
        $gejalahama = Gejalahama::orderBy('nama')->get();

        return view('pengetahuanhama/edit', compact('pengetahuanhama', 'penyakit', 'gejalahama'));
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
            'id_gejalahama' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required' => 'penyakit wajib di isi',
            'gejalahama.required' => 'gejala wajib di isi',
            'bobot.required' => 'bobot wajib di isi',
        ]);

        $pengetahuanhama = [
            'id_penyakit' => $request->input('id_penyakit'),
            'id_gejalahama' => $request->input('id_gejalahama'),
            'bobot' => $request->input('bobot'),

        ];


        pengetahuanhama::where('id', $id)->update($pengetahuanhama);
        return redirect('pengetahuanhama')->with('succses', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengetahuanhama::where('id', $id)->delete();
        return redirect('pengetahuanhama')->with('succses', 'berhasil hapus data');
    }
}
