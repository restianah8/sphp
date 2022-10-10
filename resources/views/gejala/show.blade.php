@extends('layout.template')

@section('title')
   menampilkan Data Gejala
@endsection

@section('content')
<div class="content mt-6">
<a href="/gejala" class="btn btn-secondary"><< Kembali</a>
</div>
<div class="breadcrumbs">
    <div class="col-sm-9">
        <div class="page-header float-left">
            <div class="page-title">
                <div class="content mt-180 md-180">
                
                    <h1> {{$gejala ->nama}}</h1>
                
                @if($gejala->gambar)
                <br>
                <center><img style="max-width : 350px; max-height:350px" src="{{ url('gambar').'/'.
                                    $gejala->gambar}}"/></center>  
                                @endif 
                </div>
               
                
                
            </div>
        </div>
    </div>

@endsection