@extends('layout.template')
@section('title')
    Data Hama dan Penyakit
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Hama dan Penyakit</h1>
            </div>
        </div>
    </div>
    </div>
        <div class="col-sm-12">
        <div class="page-header float-right mt-2">
        <a href="/penyakit/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                    <th>Kode </th>
                    <th>Nama </th>
                    <th>Diskripsi</th>
                    <th>Solosi</th>
                    <th>gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
          @foreach ($penyakit as $item)
                <tr>
                <td>{{$item ->id}}</td>
                <td>{{$item ->kode}}</td>
                  <td>{{$item -> nama}}</td>
                  <td>{{\Str::limit ($item ->Diskripsi, 70)}}</td>
                  <td>{{\Str::limit($item -> solosi, 70)}}</td>
                  <td>
                    @if($item->gambar)
                        <img style="max-width : 50px; max-height:50px" src="{{ url('gambar').'/'.
                        $item->gambar}}"/>
                    @endif
                  </td>
                  
                        
                 
                  <td>
                            <a href='{{url('/penyakit/'. $item -> id. '/edit')}}' class=" mb-2 fa fa-edit bg-warning p-2 text-white rounded"></a>
                            <form class = 'd-inline' action="{{'/penyakit/'.$item ->id}}"
                             onclick="return confirm('Yakin Ingin Menghapus Data')" method ='post'>
                             @csrf
                             @method ('DELETE')
                                <button class=" mb-2 fa fa-trash bg-danger p-2 text-white rounded"></button>
                            </form>
                            <a href='{{url('/penyakit/'. $item -> id)}}' class="btn btn-sm btn-info text-white"> <i class="fa fa-eye"></i>
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
@endsection



