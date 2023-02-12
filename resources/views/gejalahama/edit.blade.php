@extends('layout.template')

@section('title')
    Edit Data Gejala Hama
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Data Gejala Hama</h1>
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
                                    <form action="{{ route('gejalahama.update', $gejalahama->id) }}" method="post"
                                        novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="kode">Kode :</label>
                                            <input type="text" name="kode" value="{{ $gejalahama->kode }}"
                                                id="kode" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama :</label>
                                            <input type="text" name="nama" value="{{ $gejalahama->nama }}"
                                                id="nama" class="form-control" required="required">
                                        </div>
                                        @if ($gejalahama->gambar)
                                            <img style="max-width : 50px; max-height:50px"
                                                src="{{ url('gambarhama') . '/' . $gejalahama->gambar }}" />
                                        @endif
                                        <div class="form-group">
                                            <label for="gambarhama">gambar:</label>
                                            <input type="file" class="form-control" name="gambarhama" id="gambarhama">
                                        </div>

                                        <div class="form-group text-right">
                                            <input type="submit" value="Ubah Data" class="btn btn-primary">
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
