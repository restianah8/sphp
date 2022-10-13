@extends('layout.template')

@section('title')
    Tambah Data Hama Dan Penyakit
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data Hama Dan Penyakit</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
<a href='/penyakit' class="btn btn-secondary"><< Kembali</a>
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
                              <form action="/penyakit" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="kode">Kode:</label>
                                    <input type="text" name="kode" id="kode" 
                                    class="form-control" value = "{{Session::get ('kode')}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input type="text" name="nama" id="nama" 
                                    class="form-control" value = "{{Session::get ('nama')}}">
                                </div>

                                <div class="form-group">
                                    <label for="Diskripsi">Diskripsi:</label>
                                    <input type="text-align: justify;" name="Diskripsi" id="Diskripsi" 
                                    class="form-control" value = "{{Session::get ('Diskripsi')}}">
                                </div>

                                <div class="form-group">
                                    <label for="solosi">Solosi:</label>
                                    <input type="text-align: justify;" name="solosi" id="solosi" 
                                    class="form-control" value = "{{Session::get ('solosi')}}">
                                </div>

                                <div class="form-group">
                                    <label for="gambar">gambar:</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" >
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
