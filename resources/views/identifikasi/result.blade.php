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
                            
                            @for ($i = 0; $i < count($penyakit); $i++)
                            
                                <h5 class="fs-2">Tanaman Jagung Anda Terkena Hama atau Penyakit  :  <b>{{$penyakit [$i]}}</b></h5>
                                    <h5 class="">Presentasi : <b>{{$hasil [$i]}}</b></h5><br>
                                    <h6 class="">berikut gambar dari :  <b>{{$penyakit [$i]}}</b></h6><br>
                                            <img style="max-width : 250px; max-height:300px" 
                                               src="{{ asset('gambar/' .$gambar[$i])}}" ><br><br>
                                     <h5 class="">Solusi Dari <b>{{$penyakit [$i]}}</b> adalah sebagai berikut:</h5><br>
                                    <h6 class="">{{$solosi [$i]}}</h6><br><br><br>
                            
                        @endfor
                        <br>
                        <br>
                        <a href='/identifikasi' class="btn btn-secondary"><< Kembali</a>
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
