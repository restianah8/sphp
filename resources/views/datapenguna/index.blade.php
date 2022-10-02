@extends('layout.template')
@section('title')
    data penguna
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>data penguna</h1>
            </div>
        </div>
    </div>
    </div>
        <div class="col-sm-12">
        <div class="page-header float-right mt-2">
        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
          <table  id="bootstrap-data-table" class="table table-striped table-bordered">
           <thead>
            
                <tr>
                    <th>no </th>
                    <th>Nama </th>
                    <th>Alamat </th>
                    <th>Email</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>
          
            @foreach ($penguna as $item)
                <tr>
                    <td>{{$item ->id}}</td>
                    <td>{{$item ->name}}</td>
                    <td>{{$item -> alamat}}</td>
                    <td>{{$item ->email}}</td>
                    <td> {{$item ->password}}</td>
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
@endsection



