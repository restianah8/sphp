@extends('layout.template')

@section('title')
   menampilkan Data Hama Dan Penyakit
@endsection

@section('content')
<div class="content mt-6">
<a href='/penyakit' class="btn btn-secondary"><< Kembali</a>
</div>
<div class="breadcrumbs">
    <div class="col-sm-9">
        <div class="page-header float-left">
            <div class="page-title">
                <div class="content mt-180 md-180">
                @if($penyakit->gambar)
                <br>
                <center><img style="max-width : 350px; max-height:350px" src="{{ url('gambar').'/'.
                                    $penyakit->gambar}}"/></center>  
                                @endif 
                </div>
              
                <h1>{{$penyakit->kode}}</h1>
                    <h1>Kode : {{$penyakit->kode}}</h1>
                    <h1>Nama  : {{$penyakit->nama}}</h1> 
                    <h1> Diskripsi : </h1>
                    <div class=" text-justify">{{$penyakit->Diskripsi}}</div>
                    <br><br>
                    <h1 >Solusi:</h1> 
                    <div class= "text-lg text-slete-700 font-normal" >{{$penyakit->solosi}}</div>
                
                
            </div>
        </div>
    </div>

@endsection