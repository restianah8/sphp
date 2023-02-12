@extends('layout.template')

@section('title')
    Edit Data pengetahuan penyakit
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Data pengetahuan pakar penyakit</h1>
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
                                    @foreach ($pengetahuanpenyakit as $item)
                                        <form action="{{ route('pengetahuanpenyakit.update', $pengetahuanpenyakit->id) }}"
                                            method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                    @endforeach
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="penyakit">nama hama dan penyakit:</label>
                                            <select name="id_penyakit" id="penyakit" class="form-control">
                                                @foreach ($penyakit as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $pengetahuanpenyakit->id_penyakit) selected="selected" @endif>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gejalapenyakit">gejala:</label>
                                            <select name="id_gejalapenyakit" id="gejalapenyakit" class="form-control">
                                                @foreach ($gejalapenyakit as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $pengetahuanpenyakit->id_gejalapenyakit) selected="selected" @endif>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="bobot">bobot:</label>
                                        <input type="text" name="bobot" id="bobot" class="form-control"
                                            value="{{ $pengetahuanpenyakit->bobot }}">
                                    </div>

                                    <div class="form-group text-right">
                                        <input type="submit" value="upadate" class="btn btn-primary">
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
