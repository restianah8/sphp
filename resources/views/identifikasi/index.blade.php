@extends('layout.template')
@section('title')
    identifikasi
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>identifikasi</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                   <div id="pay-invoice">
                       <div class="card-body">
                            <form>
                                    <div class="row mb-3">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jenis" class="col-sm-2 col-form-label">jenis kelamin</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jenis">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="umur">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat">
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-10 offset-sm-2"><b>pilih gejala yang menyerang tanaman jagung anda dengan memeberikan tanda (centang)</b></legend>
                                                <div class="col-sm-10">
                                                </fieldset>
                                            <div class="row mb-3">
                                              @foreach ($gejala as $item)
                                                <div class="col-sm-10 offset-sm-2">
                                                    <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                            <label class="form-check-label" for="gridCheck1">{{$item->nama}}</label>
                                                    </div>
                                                </div>
                                               @endforeach
                                            </div>
                                        </div>
                                    
                                    <button type="submit" class="btn btn-primary">Identifikasi</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->

@endsection



