@extends('layout.template')

@section('title')
Detail Riwayat Konsultasi
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-9">
        <div class="page-header float-left">
            <div class="page-title">
                <tbody>





                    <p class="arial">Tanaman Jagung Anda Terkena Hama atau Penyakit : <b>{{$item->hama_penyakit}}</b>
                    <p>
                    <p class="lower">Presentasi : <b>{{$item->persentase}} %</b></p><br>

                    @if($item->gambar)
                    <br>
                    <center><img style="max-width : 350px; max-height:350px" src="{{ url('gambar').'/'.
                                                            $item->gambar}}" /></center>
                    @endif
                    <h1>Diskrispi:</h1>
                    <p class=" text-justify">{{$item->Diskripsi}}</p><br><br><br>

                    <h1>Solusi Dari <b>{{$item->hama_penyakit}}</b> adalah sebagai berikut:</h1>
                    <p class=" text-justify">{{$item->solosi}}</p><br><br><br>

                    <br>
                    <br>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        << Kembali</a>
                            <a href="{{ route('riwayatA.hasil', [$item->id, $item->created_at->format('Y-m-d'),
                             $item->created_at->format('H:i:s')]) }}" class="btn btn-primary">Hasil Perhitungan</a>
                </tbody>
            </div>
        </div>
    </div>
    

    @endsection