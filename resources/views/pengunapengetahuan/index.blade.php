@extends('layouts.template')
@section('title')
    Basis pengetahuan pakar
@endsection

@section('konten')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Basis pengetahuan pakar</h1>
                    <p class="mb-4"> <a target="_blank"
                           

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTable Basis pengetahuan pakar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
            
                                <tr>
                                        <th>no </th>
                                        <th>Nama Hama Dan Penyakit </th>
                                        <th>Gejala</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                            
                                @foreach ($pengetahuan as $item)
                                    <tr>
                                        <td>{{$item ->id}}</td>
                                        <td>{{$item -> penyakit->nama}}</td>
                                        <td>{{$item ->gejala->nama}}</td>
                                        
                                        
                                    </tr>
                                  @endforeach
                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

</div><!-- .content -->
@endsection



