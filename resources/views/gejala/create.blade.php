@extends('layout.template')

@section('title')
    Tambah Data Gejala
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data Gejala</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
<a href="/gejala" class="btn btn-secondary"><< Kembali</a>
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
                              <form action="{{ route('gejala.simpan') }}" method="post" novalidate="novalidate">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="kode">Kode:</label>
                                    <input type="text" name="kode" id="kode" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Gejala:</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot:</label>
                                    <input type="text" name="bobot" id="bobot" class="form-control" required="required">
                                </div>

                                <div class="form-group text-right">
                                    <input type="submit" value="Tambah Data" class="btn btn-primary">
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
