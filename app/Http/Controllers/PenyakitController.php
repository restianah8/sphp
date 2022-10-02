<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit ::all();
        return view('penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('penyakit/create');
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
        Session :: flash('nama',$request -> nama );
        Session :: flash('Diskripsi',$request -> Diskripsi);
        Session :: flash('solosi',$request -> solosi );
        $request->validate([
            'kode'=>'required',
            'nama'=>'required',
            'Diskripsi'=>'required',
            'solosi'=>'required',
            'gambar'=>'required|mimes:jpeg,jpg,png,gif'
        ], [
            'kode'=>'kode wajib di isi',
            'nama.required'=>'nama wajib di isi',
            'Diskripsi.required' =>'Diskripsi wajib di isi',
            'solosi.required'=>'solosi wajib di isi',
            'gambar.required'=>'silakan masukan gambar',
            'gambar.mimes'=>'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
        ]);
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis').".". $gambar_ekstensi;
        $gambar_file->move(public_path('gambar'), $gambar_nama);

        $penyakit = [
            'kode'=> $request -> input('kode'),
            'nama'=> $request -> input('nama'),
            'Diskripsi'=> $request -> input('Diskripsi'),
            'solosi'=> $request -> input('solosi'),
            'gambar'=>$gambar_nama
        ];
        Penyakit ::create($penyakit);
        return redirect('penyakit')->with('succses', 'berhasil memasukan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penyakit= Penyakit::where('id', $id)->first();
        return view('penyakit/show') -> with ('penyakit',$penyakit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyakit = Penyakit :: where('id', $id)->first();
        return view ('penyakit/edit') -> with ('penyakit',$penyakit);
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
            'nama'=>'required',
            'Diskripsi'=>'required',
            'solosi'=>'required',
        ], [
            'kode.required'=>'nama  wajib di isi',
            'nama.required'=>'nama  wajib di isi',
            'Diskripsi.required' =>'Diskripsi wajib di isi',
            'solosi.required'=>'solosi wajib di isi',
        ]);
        $penyakit = [
            'kode'=> $request -> input('kode'),
            'nama'=> $request -> input('nama'),
            'Diskripsi'=> $request -> input('Diskripsi'),
            'solosi'=> $request -> input('solosi'),
        ];

        if($request->hasFile('gambar')){
            $request->validate([
                'gambar'=>'mimes:jpeg,jpg,png,gif'
            ],[
                'gambar.mimes'=>'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
            ]);
            //sudah teropload di derektory
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis').".". $gambar_ekstensi;
            $gambar_file->move(public_path('gambar'), $gambar_nama);

            $penyakit_gambar= Penyakit :: where('id', $id)->first();
            File::delete(public_path('gambar').'/'. $penyakit_gambar->gambar);

            $penyakit = [
                'gambar'=>$gambar_nama
            ];
        }

        Penyakit::where('id', $id)-> update($penyakit);
        return redirect('penyakit')->with('succses', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit= Penyakit::where('id', $id)->first();
        File::delete(public_path('gambar').'/'.$penyakit->gambar);
        Penyakit::where('id', $id)-> delete();
        return redirect('penyakit')->with('succses', 'berhasil hapus data');
    }
}
