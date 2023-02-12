<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title> Riwayat Konsultasi</title>
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
                        <li class="nav-item"><a class="nav-link" href="identifikasiutama">Identifikasi</a></li>
                        <li class="nav-item "><a class="nav-link" href="pengunainfo">Info Umum Hama/Penyakit</a></li>
                        <li class="nav-item "><a class="nav-link" href="/tentang">Tentang Sistem</a></li>
                        <li class="nav-item active"><a class="nav-link" href="riwayatpenguna">Riwayat Identifikasi</a>
                        </li>
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
                    <h2>,</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mt-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <h2 style="border-bottom: 1px solid #ccc;"><b>Detail Riwayat Konsultasi</b></h2>
                        <a href="/riwayatpenguna" class="btn btn-secondary">
                            << Kembali</a>
                                <p><a class="btn hvr-hover" href="http://127.0.0.1:8000/identifikasiutama">
                                        IDENTIFIKASI ULANG</a></p>
                                <p><a class="btn hvr-hover"
                                        href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSDXXkBTksPLmfrSjvrSRhRZRlsCHspxfjHbqXnpCbfXzmkjmcVVxtXTVjDbgqKmJZhrzdGd">
                                        HUBUNGI PAKAR</a></p>
                    </div>
                </div>
                <tbody>
                    @foreach ($riwayat as $item)
                        <div class="card rounded mt-5">
                            <div class="card-header">
                                Tanaman Jagung Anda Terkena Hama atau Penyakit :
                                <b>{{ $item->hama_penyakit }}</b>
                            </div>
                            <div class="card-body">
                                <h2 class="lower">Persentase : <b>{{ $item->persentase }} %</b></h2><br>
                                @if ($item->gambar)
                                    <br>
                                    <center><img style="max-width : 350px; max-height:350px"
                                            src="{{ url('gambar') . '/' . $item->gambar }}" />
                                    </center>
                                @endif
                                <h1>Diskrispi:</h1>
                                <p class="lower text-justify">{{ $item->Diskripsi }}</p><br>

                                <h3>Solusi Dari <b>{{ $item->hama_penyakit }}</b> adalah sebagai berikut:</h3>
                                <p class="lower text-justify">{{ $item->solosi }}</p>
                            </div>
                        </div>
                    @endforeach
                </tbody>
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
