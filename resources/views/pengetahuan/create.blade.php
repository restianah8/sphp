@extends('layout.template')

@section('title')
    Tambah Data Basis Pengetahuan
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data Basis Pengetahuan</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
<a href='/pengetahuan' class="btn btn-secondary"><< Kembali</a>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <!-- Credit Card -->
                      <div id="pay-invoice">
                          <div class="card-body">
                              <form action="/pengetahuan" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="kode">Kode:</label>
                                    <input type="text" name="kode" id="kode" 
                                    class="form-control" value = "{{Session::get ('kode')}}">
                                </div>
                                <div class="form-group">
                                    <label for="hama_dan_penyakit">hama_dan_penyakit :</label>
                                    <input type="text" name="hama_dan_penyakit" id="hama_dan_penyakit" 
                                    class="form-control" value = "{{Session::get ('hama_dan_penyakit')}}">
                                </div>

                                <div class="form-group">
                                    <label for="gejala">gejala:</label>
                                    <input type="text" name="gejala" id="gejala" 
                                    class="form-control" value = "{{Session::get ('gejala')}}">
                                </div>

                                <div class="form-group text-right">
                                    <input type="submit" value="simpan" class="btn btn-primary">
                                </div>
                              </form>
                          </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
