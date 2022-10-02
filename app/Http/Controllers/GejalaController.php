<?php

namespace App\Http\Controllers;
use App\Models\Gejala;
use Illuminate\Http\Request;

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
        
      $nama = $request->nama;
 
 
       $gejala = new Gejala; //manggil model gejala
        
       $gejala->kode = $request->input('kode');
       $gejala->nama = $request->input('nama');
       $gejala->bobot = $request->input('bobot');
       $gejala->save();
 
       return redirect()->to('gejala')->with('Success', 'Berhasil menambah data');
   }
 
    
     //public function show()
    // {
         //
    // }
 
     
   public function edit(Gejala $gejala)
    {
         
       return view('gejala.edit',compact('gejala'));
    }
 
   
   public function update (Request $request, Gejala $gejala)
    {
        $gejala->kode = $request->input('kode');
        $gejala->nama = $request->input('nama');
        $gejala->bobot = $request->input('bobot');
        $gejala->save();
        return redirect()->to('gejala') ->withSuccess('Berhasil mengubah data');
     }
 
    
     public function destroy(Gejala $gejala)
     {
         $gejala->delete();
 
         return redirect()
             ->to('gejala')
            ->withSuccess('Berhasil menghapus data');
     }
 
     
 }
 
