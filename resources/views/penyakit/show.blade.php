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
                
                <p>
                    <b>kode</b>
                    <br>{{$penyakit->kode}}</br>
                </p>
                <p>
                    <b>nama  : </b> {{$penyakit->nama}}
                </p>
                <p>
                    <b>Diskripsi <br> </b>{{$penyakit->Diskripsi}}
                </p>
                <p>
                    <b>solosi</b> <br>{{$penyakit->solosi}}
                </p>
                
            </div>
        </div>
    </div>

@endsection