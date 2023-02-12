@extends('layout.template')
@section('title')
    Hasil Perhitungan
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="d-flex justify-content-between">
                    <h3 style="border-bottom: 1px solid #ccc;">Hasil Identifikasi</h3>

                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        << Kembali </a>
                </div>



                @foreach (getGejalaTertinggi($identifikasi->id) as $tertinggi)
                    <div class="card rounded mt-3">
                        <div class="card-header">
                            Tanaman Jagung Anda Terkena Hama atau Penyakit :
                            <b>{{ $tertinggi->penyakit->nama }}</b>
                        </div>
                        <div class="card-body">
                            <p class="lower">Persentase : <b>{{ $tertinggi->persentase }} %</b></p>

                            @if (count($tertinggi->penyakit->media) > 0)
                                <div class="row">
                                    @foreach ($tertinggi->penyakit->media as $media)
                                        <div class="col">
                                            <img src="{{ $media->getFullUrl() }}" alt="" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <br>
                            <br>
                            <h6>Deskrispi {{ $tertinggi->penyakit->nama }}:</h6>
                            <div class=" text-justify mt-1 text-muted">{{ $tertinggi->penyakit->Diskripsi }}</div><br>

                            <h6>Solusi dari {{ $tertinggi->penyakit->nama }} :</h6>
                            <div class=" text-justify text-muted">{{ $tertinggi->penyakit->solosi }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-12">
                <div class="card rounded">
                    <div class="card-header">
                        <h5 class="card-title">Riwayat Identifikasi</h5>
                    </div>
                    <table class="table table-condesed table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No </th>
                                <th>Nama Hama Dan Penyakit</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (getGejala($identifikasi->id) as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->penyakit->nama }}</td>
                                    <td>{{ $item->persentase }} %</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection
