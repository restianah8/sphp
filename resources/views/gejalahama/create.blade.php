@extends('layout.template')

@section('title')
    Tambah Data Gejala Hama
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Data Gejala Hama</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <a href="/gejalahama" class="btn btn-secondary">
            << Kembali</a>
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
                                    <form action="{{ route('gejalahama.simpan') }}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="kode">Kode:</label>
                                            <input type="text" name="kode" id="kode" class="form-control"
                                                required="required" value="{{ Session::get('kode') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Gejala:</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                required="required" value="{{ Session::get('nama') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="gambarhama">gambar:</label>
                                            <input type="file" class="form-control" name="gambarhama" id="gambarhama">
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
