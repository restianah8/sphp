@extends('layout.template')

@section('title')
    Tambah Data Basis Pengetahuan Penyakit
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Data Basis Pengetahuan Penyakit</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <a href='/pengetahuanpenyakit' class="btn btn-secondary">
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
                                    <form action="{{ route('pengetahuanpenyakit.simpan') }}" method="post"
                                        novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_penyakit">Nama hama dan penyakit:</label>
                                                <select name="id_penyakit" id="penyakit" class="form-control">
                                                    @foreach ($penyakit as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_gejalapenyakit">gejala:</label>
                                                <select name="id_gejalapenyakit" id="gejalapenyakit" class="form-control">
                                                    @foreach ($gejalapenyakit as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="bobot">bobot:</label>
                                            <input type="text" name="bobot" id="bobot" class="form-control"
                                                value="{{ Session::get('bobot') }}">
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
