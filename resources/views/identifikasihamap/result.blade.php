<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Identifikasi</title>
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
                        <li class="nav-item active"><a class="nav-link" href="identifikasiutama">Konsultasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="pengunainfo">Info Hama Dan Penyakit</a></li>
                        <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Sistem</a></li>
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
                <div class="col-lg-12">
                    <h2>,</h2>
                    <h2>,</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row mb-3">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h3>Hasil Identifikasi hama Jagung</h3>

                        <a href='/identifikasiutama' class="btn btn-secondary">
                            << Kembali</a>
                    </div>

                    <p class="mb-4">
                    <div class="content mt-3">
                        <div class="animated fadeIn">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div id="pay-invoice">
                                            <div class="card-body">
                                                <tbody>
                                                    <?php
                                                    $bnt = [];
                                                    foreach ($hasil as $a => $b) {
                                                        $bnt[$a] = (int) $b;
                                                    }
                                                    
                                                    ?>
                                                    @for ($i = 0; $i < count($penyakit); $i++)
                                                        @if ($bnt[$i] == max($bnt))
                                                            <p class="arial">Tanaman Jagung Anda Terkena Hama atau
                                                                Penyakit : <b>{{ $penyakit[$i] }}</b>
                                                            <p>
                                                            <p class="lower">Presentasi : <b>{{ $hasil[$i] }}</b>
                                                            </p><br>
                                                            <p class="lower">berikut gambar dari :
                                                                <b>{{ $penyakit[$i] }}</b>
                                                            </p><br>
                                                            <img style="max-width : 250px; max-height:300px"
                                                                src="{{ asset('gambar/' . $gambar[$i]) }}"><br><br>
                                                            <p class="lower">Solusi Dari <b>{{ $penyakit[$i] }}</b>
                                                                adalah sebagai berikut:</p><br>
                                                            <p class="lower">{{ $solosi[$i] }}</p><br><br><br>
                                                        @endif
                                                    @endfor
                                                    <br>
                                                    <br>

                                                    <div class="row mb-4">
                                                        <div class="col-4 mt-1 mb-1">
                                                            <div class="d-flex justify-content-between">
                                                                <p><a class="btn hvr-hover"
                                                                        href="http://127.0.0.1:8000/riwayatpenguna">Riwayat
                                                                        Konsultasi </a>
                                                                </p><br><br>
                                                                <p><a class="btn hvr-hover"
                                                                        href="http://127.0.0.1:8000/identifikasiutama">Identifikasi
                                                                        Ulang
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </tbody>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
