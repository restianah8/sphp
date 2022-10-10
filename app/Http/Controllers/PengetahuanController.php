<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengetahuan = Pengetahuan ::all();
        $penyakit = Penyakit ::all();
        $gejala = Gejala ::all();
        return view('pengetahuan.index',compact('pengetahuan','penyakit','gejala' ));
    }

    /**::with('jenis_bencana', 'kabupaten', 'kecamatan', 'kelurahan')-;
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengetahuan = Pengetahuan ::all();
        $penyakit = Penyakit ::all();
        $gejala = Gejala ::all();
        return view ('pengetahuan/create',compact('penyakit','gejala' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session :: flash('bobot',$request -> bobot );
        $request->validate ([
            'id_penyakit' => 'required',
            'id_gejala' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required'=>'penyakit wajib di isi',
            'gejala.required'=>'gejala wajib di isi',
            'bobot.required' =>'bobot wajib di isi',
        ]);

        $pengetahuan = [
            'id_penyakit'=> $request -> input('id_penyakit'),
            'id_gejala'=> $request -> input('id_gejala'),
            'bobot'=> $request -> input('bobot'),
            
        ];

    session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');
        
       
        Pengetahuan ::create($pengetahuan);
        return redirect('pengetahuan')->with('succses', 'berhasil memasukan data');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengetahuan= Pengetahuan::where('id', $id)->first();
        return view('pengetahuan/show') -> with ('pengetahuan',$pengetahuan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengetahuan = Pengetahuan::findOrFail($id);
        $penyakit = Penyakit::orderBy('nama')->get();
        $gejala = Gejala::orderBy('nama')->get();

        return view('pengetahuan/edit', compact('pengetahuan', 'penyakit', 'gejala'));
       
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
        $request->validate ([
            'id_penyakit' => 'required',
            'id_gejala' => 'required',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ], [
            'penyakit.required'=>'penyakit wajib di isi',
            'gejala.required'=>'gejala wajib di isi',
            'bobot.required' =>'bobot wajib di isi',
        ]);

        $pengetahuan = [
            'id_penyakit'=> $request -> input('id_penyakit'),
            'id_gejala'=> $request -> input('id_gejala'),
            'bobot'=> $request -> input('bobot'),
            
        ];


        Pengetahuan::where('id', $id)-> update($pengetahuan);
        return redirect('pengetahuan')->with('succses', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengetahuan::where('id', $id)-> delete();
        return redirect('pengetahuan')->with('succses', 'berhasil hapus data');
    }
}
