<?php

namespace App\Http\Controllers;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GejalaController extends Controller
{
    public function index()
    {
      $gejala = Gejala::all();
 
        return view('gejala.index',compact('gejala'));
    }
     
     public function create()
    {
        return view('gejala.create');
    }
 
     
public function store (Request $request)
    {
        
        Session :: flash('kode',$request -> kode );
        Session :: flash('nama',$request -> nama );
        $request->validate([
            'kode'=>'required',
            'nama'=>'required',
            'gambar'=>'required|mimes:jpeg,jpg,png,gif'
        ], [
            'kode'=>'kode wajib di isi',
            'nama.required'=>'nama wajib di isi',
            'gambar.required'=>'silakan masukan gambar',
            'gambar.mimes'=>'gambar hanya diperbolehkan berekstensi jpeg,jpg,png,gif',
        ]);
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis').".". $gambar_ekstensi;
        $gambar_file->move(public_path('gambar'), $gambar_nama);

        $gejala = [
            'kode'=> $request -> input('kode'),
            'nama'=> $request -> input('nama'),
            'gambar'=>$gambar_nama
        ];
        Gejala ::create($gejala);
        return redirect('gejala')->with('succses', 'berhasil memasukan data');
   }
 
    
     public function show($id)
    {
        $gejala= Gejala::where('id', $id)->first();
        return view('gejala/show') -> with ('gejala',$gejala);  
    }
 
     
   public function edit(Gejala $gejala)
    {
         
       return view('gejala.edit',compact('gejala'));
    }
 
   
   public function update (Request $request,  $id)
    {
        $request->validate([
            'kode'=>'required',
            'nama'=>'required',
        ], [
            'kode.required'=>'nama  wajib di isi',
            'nama.required'=>'nama  wajib di isi',
        ]);
        $gejala = [
            'kode'=> $request -> input('kode'),
            'nama'=> $request -> input('nama'),
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

            $gejala_gambar= Gejala :: where('id', $id)->first();
            File::delete(public_path('gambar').'/'. $gejala_gambar->gambar);

            $gejala = [
                'gambar'=>$gambar_nama
            ];
        }

        Gejala::where('id', $id)-> update($gejala);
        return redirect('gejala')->with('succses', 'berhasil melakukan update data');

     }
 
    
     public function destroy($id)
     {
        $gejala= Gejala::where('id', $id)->first();
        File::delete(public_path('gambar').'/'.$gejala->gambar);
        Gejala::where('id', $id)-> delete();
        return redirect('gejala')->with('succses', 'berhasil hapus data');
     }
 
     
 }
 
