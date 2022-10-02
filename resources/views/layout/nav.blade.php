<script src="{{ asset('template/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand" href="">Admin</a>
                <a class="navbar-brand hidden" href="">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <h3 class="menu-title"></h3>
                    </li>

                   
                    <h3 class="menu-title">Data</h3>
                    <li class="menu-item  dropdown">
                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href = "penyakit"><i class="menu-icon fa fa-table" ></i> Data Hama Dan Penyakit</a>
                    </li>
                
                    <li class="menu-item  dropdown">
                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href = "gejala"><i class="menu-icon fa fa-table" ></i> Data Gejala</a>
                        
                    </li>
                    <li class="menu-item  dropdown">
                        <a href="#" class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href = "pengetahuan"><i class="menu-icon fa fa-table" ></i> Basis Pengetahuan</a>
                        
                    </li>
                    
                    <li>
                        <li class="menu-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href = ""> <i class="menu-icon fa fa-table"></i> Identifikasi</a>
                            <h3 class="menu-title"></h3>
                    </li>
                    <li>
                        <li class="menu-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href = "datapenguna"> <i class="menu-icon fa fa-table"></i> Data Pengguna</a>
                    </li>

                    <li class="menu-item dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href = ""><i class="menu-icon fa fa-table"></i> Ganti Pasword</a>   
                    </li>
                    <li class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link logout-btn" href="/sesi/logout"><i class="fa fa-power-off"></i>  Logout</a>  
                    </li>
                   
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

                </div>
            </div>

       