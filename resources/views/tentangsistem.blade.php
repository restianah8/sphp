@extends('layouts.template')
@section('title')
    Cara Kerja Sistem
@endsection

@section('konten')
<div class="container-fluid">

<div class="card shadow mb-4 mt-4">
                    <h1 class="h3 mb-2 text-black-800">Cara Kerja Sistem</h1>
                    <p class="mb-4"> 
                           
             <div class="content mt-180 md-180">
                
                <br>
                <center><img style="max-width : 350px; max-height:350px" src="{{asset ('publik/assets/img/jagung.jpeg')}}"/></center>  
                <p class="mb-4">        
                </div>
                <h1 class="h5 mb-2 text-black-800">Sistem ini merupakan sistem yang di bangun ntuk memudahkan parah petani jagung
                    untuk mengidentifikasi hama dan penyakit yang menyerang tanaman jagung yang dimilikinya. Pada sistem ini terdapat
                    8 penyakit dan 9 hama tanaman jagung dengan 50 gejala. Sistem ini dibangun berdasarkan pengetahuan seorang pakar.
                    Dengan adanya sistem ini bisa memberikan informasi serta membantu dan mempermuda petani untuk mengidentifikasi hama
                     dan penyakit , sehingga dapat memberikan penanganan yang tepat pada tanaman jagung yang terserang hama dan penyakit.
                </h1>
                    <p class="mb-4"> 
                    <h1 class="h4 mb-2 text-black-800"><b >Cara Mengunakan Sistem:</b></h1>
                    
                    <span class="align-middle">(1).  Pilih Menu "Identifikasi"</span>
                    <span class="align-middle">(2).  Centang gejala yang terdapa pada tanaman jagung anda</span>
                    <span class="align-middle">(3).  Klik tombol "Identifikasi" untuk melihat hasil identifikasi</span>
                    <span class="align-middle">(4).  Untuk melihat Info Hama Dan penyakit, klik menu ifo hama dan penyakit</span>
               
             

</div>
@endsection



