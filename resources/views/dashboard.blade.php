@extends('layout.template')

@section('title')
     Dashboard
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Selamat Datang di halaman dashboard</h1>
            </div>
        </div>
    </div>
</div>

 <div class="content mt-3">
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count" >17</span>
                        </h4>
                        <p class="text-light">Hama dan Penyakit</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div> 
            
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">49</span>
                        </h4>
                        <p class="text-light">Gejala</p>

                    </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                </div>
            </div>
            <!--/.col-->
           
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10</span>
                        </h4>
                        <p class="text-light">Basis pengetahuan</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">3</span>
                        </h4>
                        <p class="text-light">Data Penguna</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Kelola Hasil Identifikasi</strong>
                </div>
                <div class="card-body">
          <table  id="bootstrap-data-table" class="table table-striped table-bordered">
           <thead>
            
                <tr>
                    <th>no </th>
                    <th>Nama </th>
                    <th>Jenis kelamin </th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Tanggal kunsoltasi</th>
                    <th>Presentase</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
     @foreach ($riwayat as $item)
                <tr>
                        <td>{{$item ->id}}</td>
                        <td>{{$item ->nama}}</td>
                        <td>{{$item ->jenis_kelamin}}</td>
                        <td>{{$item ->umur}}</td>      
                        <td>{{$item ->alamat}}</td>  
                        <td>{{$item ->created_at->format('Y-m-d') }}</td>  
                        <td>{{$item ->response}}</td>  
                    
                  <td>
                            <a href='' class="btn btn-sm btn-info text-white"> <i class="fa fa-eye"></i>
                        </td>
                        
                </tr>
         @endforeach
           </tbody>
          </table>
                </div>
            </div>
        </div>


     </div>
    </div><!-- .animated -->
</div><!-- .content -->
            <!--/.col-->
            @endsection