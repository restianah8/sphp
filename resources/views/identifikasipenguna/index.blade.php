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
                        <li class="nav-item active"><a class="nav-link" href="identifikasiutama">Identifikasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="pengunainfo">Info Umum Hama/Penyakit</a></li>
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
                    <h2>Identifikasi</h2>
                    <h2>,</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row mb-3">
                <center>
                    @if (Session::get('succses'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('succses') }}</div>
                    @endif
                </center>
                <a href="/identifikasiutama" class="btn btn-secondary">
                    << Kembali</a>
                        <form action="/identifikasipenguna/result" method="post">
                            @csrf

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-10 offset-sm-2"><b>Untuk mengidentifikasi kerusakan
                                        tanaman
                                        jagung
                                        anda silahkan memilih gambar Gejala Berikut ini, klik tombol hama atau penyakit.
                                        Hasil yang diberikan merupakan kesimpulan terdekat dari pilihan anda. apa bila
                                        tidak
                                        yakin dan tidak puas
                                        silahkan hubungi pakar klik disini </b></legend>
                                <div class="col-sm-10">
                            </fieldset>




                            <div class="row md-4 mt-4">
                                @foreach ($gejala as $item)
                                    <div class="col-xl-3 col-md-5 mb-2 ">
                                        <div class="card" style="width: 15rem;">
                                            <img src="{{ url('gambar') . '/' . $item->gambar }}" class="card-img-top"
                                                alt="image" height="150px" width="80px">
                                            <div class="card-body">
                                                <div class="col-sm-20 offset-sm-0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="kode-{{ $item->id }}"
                                                            type="checkbox" id="kode[]" name="kode[]"
                                                            value="{{ $item->id }}">
                                                        <label class="form-check-label"
                                                            for="kode-{{ $item->id }}">[<b>{{ $item->kode }}</b>].
                                                            {{ $item->nama }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
            </div>
        </div>

        <center><button type="submit" class="btn hvr-hover">Identifikasi</button></center>
        </form>


    </div>
    </div>
    <!-- End Cart -->



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
