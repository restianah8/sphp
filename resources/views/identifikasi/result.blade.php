@extends('layout.template')

@section('title')
    Hasil Identifikasi
@endsection

@section('content')
    <!-- <div class="container"> -->
    <div class="text-center">
        <div class="col-sm-12">

            <div class="page-title">
                <h1>Hasil Identifikasi</h1>
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


                                <table class="tg">
                                    <tbody>
                                        <?php
                                        $bnt = [];
                                        foreach ($hasil as $a => $b) {
                                            $bnt[$a] = (int) $b;
                                        }
                                        
                                        ?>
                                        @for ($i = 0; $i < count($penyakit); $i++)
                                            @if ($bnt[$i] == max($bnt))
                                                <div class="fs-2">Tanaman Jagung Anda Terkena Hama atau Penyakit :
                                                    <b>{{ $penyakit[$i] }}</b>
                                                </div>
                                                <div class="">Presentasi : <b>{{ $hasil[$i] }}</b></div><br>
                                                <div class="">berikut gambar dari : <b>{{ $penyakit[$i] }}</b></div>
                                                <br>
                                                <img style="max-width : 250px; max-height:300px"
                                                    src="{{ asset('gambar/' . $gambar[$i]) }}"><br><br>
                                                <div class="">Solusi Dari <b>{{ $penyakit[$i] }}</b> adalah sebagai
                                                    berikut:</div><br>
                                                <div class="">{{ $solosi[$i] }}</div><br><br><br>
                                            @endif
                                        @endfor
                                        <br>
                                        <br>
                                        <div class="row mb-4">
                                            <div class="col-5 mt-1 mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <p><a class="btn btn-primary"
                                                            href="http://127.0.0.1:8000/dashboard">Riwayat
                                                            Konsultasi </a>
                                                    </p><br><br>
                                                    <p><a class="btn btn-primary" href='/identifikasi'>Identifikasi
                                                            Ulang
                                                        </a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                </table>
                                </body>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
