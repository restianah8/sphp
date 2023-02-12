<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Konsultasi</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('utama/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('utama/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('utama/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('utama/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('utama/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('utama/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('utama/images/logo.png') }}"
                            class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="{{ route('template') }}">dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="identifikasipenguna">Konsultasi</a></li>
                        <li class="nav-item "><a class="nav-link" href="pengunainfo">Info Hama Dan Penyakit</a></li>
                        <li class="nav-item active"><a class="nav-link" href="/tentang">Tentang Sistem</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayatpenguna">Riwayat Konsultasi</a></li>
                        <li class="nav-item "><a class="nav-link" href="/sesi/logout">LOG OUT</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->


            </div>

        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->



    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-15">
                    <h2 style="text-align:center">Cara Kerja Sistem</h2>


                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row mb-4">



            </div>


            <div class="content mt-180 md-180">

                <br>
                <center><img style="max-width : 350px; max-height:350px"
                        src="{{ asset('publik/assets/img/jagung.jpeg') }}" /></center>

            </div>
            <br>
            <br>

            <h3 class=" lower text-justify mt-1 text-muted ">Sistem ini merupakan sistem yang di bangun ntuk memudahkan
                parah petani jagung
                untuk mengidentifikasi hama dan penyakit yang menyerang tanaman jagung yang dimilikinya. Pada sistem ini
                terdapat
                8 penyakit dan 9 hama tanaman jagung dengan 50 gejala. Sistem ini dibangun berdasarkan pengetahuan
                seorang pakar.
                Dengan adanya sistem ini bisa memberikan informasi serta membantu dan mempermuda petani untuk
                mengidentifikasi hama
                dan penyakit , sehingga dapat memberikan penanganan yang tepat pada tanaman jagung yang terserang hama
                dan penyakit.</h3><br>
            <h1><b>Cara Mengunakan Sistem:<b> </h1>
            <h3>(1). Pilih Menu "Kosultasi"</h3>
            <h3> (2). Centang gejala yang terdapa pada tanaman jagung anda </h3>
            <h3>(3). Klik tombol "Identifikasi" untuk melihat hasil identifikasi</h>
                <h3>(4). Untuk melihat Info Hama Dan penyakit, klik menu ifo hama dan penyakit</h3>
                <h3>(5). Untuk melihat riwayat Konsultasi, klik menu Riwayat Kosultasi dan setelah itu pilih icon detail
                </h3>

                <br>


        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('utama/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('utama/js/popper.min.js') }}"></script>
    <script src="{{ asset('utama/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('utama/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('utama/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('utama/js/inewsticker.js') }}"></script>
    <script src="{{ asset('utama/js/bootsnav.js.') }}"></script>
    <script src="{{ asset('utama/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('utama/js/isotope.min.js') }}"></script>
    <script src="{{ asset('utama/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('utama/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('utama/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('utama/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('utama/js/custom.js') }}"></script>
</body>

</html>
