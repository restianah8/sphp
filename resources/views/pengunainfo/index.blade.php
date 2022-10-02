@extends('layouts.template')

@section('title')
     Dashboard penguna
@endsection

@section('konten')
  <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Info Hama Dan Penyakit</h6>
      </div>
     
          <div class="row md-4 mt-4">
             @foreach ($penyakit as $item)
             
                <div class="col-xl-3 col-md-5 mb-2 ">
                  <div class="card" style="width: 18rem;">
                      <img src="{{ url('gambar').'/'.$item->gambar}}" class="card-img-top" alt="image" height="180px" width="180px" >
                        <div class="card-body">
                          <h5 class="card-title">{{$item -> nama}}</h5>
                            <a href="{{url('/pengunainfo/'. $item -> id)}}" class="btn btn-primary">Data Selengkapnya</a>
                        </div>
                    </div>
                </div> 
                

              @endforeach
          </div>
          
  </div>   
@endsection
