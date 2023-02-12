<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Dashboard Penguna</title>
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

    @include('komponen/pesan')
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
                    <a class="navbar-brand" href=""><img src="{{ asset('utama/images/logo.png') }}"
                            class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('template') }}">dashboard</a>
                        </li>
                        <li class="nav-item "><a class="nav-link" href="identifikasiutama">Identifikasi</a></li>
                        <li class="nav-item "><a class="nav-link" href="pengunainfo">Info Umum Hama / Penyakit</a></li>
                        <li class="nav-item "><a class="nav-link" href="/tentang">Tentang Sistem</a></li>
                        <li class="nav-item "><a class="nav-link" href="riwayatpenguna">Riwayat Identifikasi</a></li>
                        <li class="nav-item "><a class="nav-link" href="/sesi/logout">LOG OUT</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->


            </div>

        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->



    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('utama/images/5.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat Datang <br> di Sistem Pakar</strong></h1>
                            <p class="m-b-40">Hama dan Penyakit Tanaman Jagung </p>
                            <p><a class="btn hvr-hover" href="identifikasiutama">Mulai Identifikasi</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('utama/images/12.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat Datang <br> di Sistem Pakar</strong></h1>
                            <p class="m-b-40">Hama dan Penyakit Tanaman Jagung </p>
                            <p><a class="btn hvr-hover" href="identifikasipenguna">Mulai Identifikasi</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('utama/images/14.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Selamat Datang <br> di Sistem Pakar</strong></h1>
                            <p class="m-b-40">Hama dan Penyakit Tanaman Jagung </p>
                            <p><a class="btn hvr-hover" href="identifikasiutama">Mulai Identifikasi</a></p>

                        </div>

                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('utama/images/1.jpeg') }}" alt="" />
                        <a class="btn hvr-hover" href="http://127.0.0.1:8000/pengunainfo/4">Penyakit Hawar Daun</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('utama/images/22.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="http://127.0.0.1:8000/pengunainfo/10">Hama Belalang</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('utama/images/16.jpeg') }}" alt="" />
                        <a class="btn hvr-hover" href="http://127.0.0.1:8000/pengunainfo/7">Penyakit Gosong</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-detail-box-main">
        <div class="container">
            <h1><b>Cara Mengunakan Sistem:<b> </h1>
            <h3>(1). Pilih Menu "Identifikasi"</h3>
            <h3> (2). Centang gejala yang terdapa pada tanaman jagung anda </h3>
            <h3>(3). Klik tombol "Identifikasi" untuk melihat hasil identifikasi</h3>
            <h3>(4). Untuk melihat Info Hama Dan penyakit, klik menu ifo hama dan penyakit</h3>
            <h3>(5). Untuk melihat riwayat Konsultasi, klik menu Riwayat Kosultasi dan setelah itu pilih icon detail
            </h3>

        </div>
    </div>
    </div>
    <!-- End Categories -->
    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/2.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/3.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/17.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/9.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/8.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/7.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('utama/images/6.jpeg') }}" alt="" />
                    <div class="hov-in">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Instagram Feed  -->






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
