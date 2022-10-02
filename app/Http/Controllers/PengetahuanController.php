<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
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
        return view('pengetahuan.index',compact('pengetahuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pengetahuan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session :: flash('kode',$request -> kode );
        Session :: flash('hama_dan_penyakit',$request -> hama_dan_penyakit );
        Session :: flash('gejala',$request -> gejala);
        $request->validate([
            'kode'=>'required',
            'hama_dan_penyakit'=>'required',
            'gejala'=>'required',
        ], [
            'kode'=>'kode wajib di isi',
            'hama_dan_penyakit.required'=>'nama wajib di isi',
            'gejala.required' =>'Diskripsi wajib di isi',
        ]);
      

        $pengetahuan = [
            'kode'=> $request -> input('kode'),
            'hama_dan_penyakit'=> $request -> input('hama_dan_penyakit'),
            'gejala'=> $request -> input('gejala'),
        ];
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
        $pengetahuan = Pengetahuan :: where('id', $id)->first();
        return view ('pengetahuan/edit') -> with ('pengetahuan',$pengetahuan);
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
            'kode'=>'required',
            'hama_dan_penyakit'=>'required',
            'gejala'=>'required',
        ], [
            'kode.required'=>'kode  wajib di isi',
            'hama_dan_penyakit.required'=>'hama dan penyakit  wajib di isi',
            'gejala.required' =>'gejala wajib di isi',
        ]);
        $pengetahuan = [
            'kode'=> $request -> input('kode'),
            'hama_dan_penyakit'=> $request -> input('hama_dan_penyakit'),
            'gejala'=> $request -> input('gejala'),
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
