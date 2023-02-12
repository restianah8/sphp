@extends('layout.template')

@section('title')
    menampilkan Data Hama Dan Penyakit
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-3">
                <div class="d-flex justify-content-between">
                    <h3>Data {{ $penyakit->nama }}</h3>

                    <a href='/penyakit' class="btn btn-secondary">
                        << Kembali </a>
                </div>
                <div class="card rounded">
                    <div class="card-header">
                        @if (count($penyakit->media) > 0)
                            <div class="row">
                                @foreach ($penyakit->media as $media)
                                    <div class="col">
                                        <img src="{{ $media->getFullUrl() }}" alt="image" height="300px" width="300px"
                                            class="rounded img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h1>{{ $penyakit->kode }}</h1>
                        <div>
                            <b>Kode:</b> {{ $penyakit->kode }}
                        </div>
                        <div><b>Nama:</b> {{ $penyakit->nama }}</div>
                        <div><b>Deskripsi:</b></div>
                        <div class=" text-justify">{{ $penyakit->Diskripsi }}</div><br>

                        <b>Solusi Dari {{ $penyakit->nama }}:</b>
                        <div>{{ $penyakit->solosi }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
