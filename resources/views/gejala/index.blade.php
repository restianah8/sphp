@extends('layout.template')
@section('title')
    Data Gejala
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data gejala</h1>
            </div>
        </div>
    </div>
    </div>
        <div class="col-sm-12">
        <div class="page-header float-right mt-2">
        <a href="gejala/tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                    <th>No </th>
                    <th>Kode </th>
                    <th>Nama Gejala</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
           @foreach ($gejala as $item)
           
                <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$item ->kode}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    @if($item->gambar)
                        <img style="max-width : 50px; max-height:50px" src="{{ url('gambar').'/'.
                        $item->gambar}}"/>
                    @endif
                  </td>  
                 
                  <td>
                            <a href="gejala/edit/{{$item->id}}" class=" mb-2 fa fa-edit bg-warning p-2 text-white rounded"></a>
                            <a href="gejala/hapus/{{$item->id}}" onclick="return confirm('Yakin Ingin Menghapus Data')"
                                class=" mb-2 fa fa-trash bg-danger p-2 text-white rounded"></a>
                            <a href="{{ route('gejala.show', $item->id) }}" class="btn btn-sm btn-info text-white"> <i class="fa fa-eye"></i>
                        </td>
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



