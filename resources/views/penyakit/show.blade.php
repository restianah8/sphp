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
                    <h1>kode : {{$penyakit->kode}}</h1>
                    <h1>nama  : {{$penyakit->nama}}</h1> 
                    <h1>Diskripsi : </h1>{{$penyakit->Diskripsi}}
                    <br><br>
                    <h1>solosi:</h1> {{$penyakit->solosi}}
                
                
            </div>
        </div>
    </div>

@endsection