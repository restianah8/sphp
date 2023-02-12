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
                        <li class="nav-item "><a class="nav-link" href="identifikasiutama">Identifikasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="pengunainfo">Info Umum Hama/Penyakit</a></li>
                        <li class="nav-item"><a class="nav-link" href="/tentang">Tentang Sistem</a></li>
                        <li class="nav-item active"><a class="nav-link" href="">Riwayat Konsultasi</a></li>
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
                    <h2>Riwayat Konsultasi</h2>
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
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>

                        <tr>
                            <th>no </th>
                            <th>Nama </th>
                            <th>Alamat</th>
                            <th>TGL Konsultasi</th>
                            <th>Hama Dan Penyakit Penyerang</th>
                            <th>Presentase</th>
                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($riwayat as $hasil)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $hasil->penguna->name ?? 'None' }}</td>
                                <td>{{ $hasil->penguna->alamat ?? 'None' }}</td>

                                <td>{{ $hasil->created_at }}</td>
                                <td>
                                    @if (count(getGejalaTertinggi($hasil->id)) > 1)
                                        <ol>
                                            @foreach (getGejalaTertinggi($hasil->id) as $it)
                                                <li>{{ $it->penyakit->nama }}</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        {{ getGejalaTertinggi($hasil->id)[0]->penyakit->nama }}
                                    @endif
                                </td>
                                <td>
                                    @if (count(getGejalaTertinggi($hasil->id)) > 1)
                                        <ol style="list-style: none">
                                            @foreach (getGejalaTertinggi($hasil->id) as $it)
                                                <li>{{ $it->persentase }}%</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        {{ getGejalaTertinggi($hasil->id)[0]->persentase }}%
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('Riwayat.show', [$hasil->id_penguna, $hasil->created_at]) }}"
                                        class="btn btn-sm btn-info text-white"> <i class="fa fa-eye"></i>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>


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
