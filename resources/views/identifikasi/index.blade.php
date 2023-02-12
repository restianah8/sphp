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
                                <form action="/identifikasi/result" method="post">
                                    @csrf

                                    <legend class="col-form-label col-sm-10 offset-sm-2"><b>pilih gejala yang menyerang
                                            tanaman jagung anda dengan memeberikan tanda (centang)</b></legend>


                                    <div class="row  md-4 mt-4">
                                        @foreach ($gejala as $item)
                                            <div class="col-xl-3 col-md-5 mb-2 ">
                                                <div class="card" style="width: 15rem;">
                                                    <img src="{{ url('gambar') . '/' . $item->gambar }}"
                                                        class="card-img-top" alt="image" height="150px" width="80px">
                                                    <div class="card-body">
                                                        <div class="col-sm-20 offset-sm-0">
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                    id="kode-{{ $item->id }}" type="checkbox"
                                                                    id="kode[]" name="kode[]"
                                                                    value="{{ $item->id }}">
                                                                <label class="form-check-label"
                                                                    for="kode-{{ $item->id }}">[<b>{{ $item->kode }}</b>].
                                                                    {{ $item->nama }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <center><button type="submit" class="btn btn-primary">Identifikasi</button></center>
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
