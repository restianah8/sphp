@extends('layout.template')

@section('title')
    Edit Data Hama Dan Penyakit
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Data Hama Dan Penyakit</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <a href='/penyakit' class="btn btn-secondary">
            << Kembali</a>
    </div>

    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->

                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="{{ '/penyakit/' . $penyakit->id }}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <h1>kode :{{ $penyakit->kode }}</h1>
                                        </div>

                                        <div class="form-group">
                                            <label for="kode">Kode:</label>
                                            <input type="text" name="kode" id="kode" class="form-control"
                                                value="{{ $penyakit->kode }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama :</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                value="{{ $penyakit->nama }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="Diskripsi">Diskripsi:</label>
                                            <input type="text" name="Diskripsi" id="Diskripsi" class="form-control"
                                                value="{{ $penyakit->Diskripsi }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="solosi">Solosi:</label>
                                            <input type="text" name="solosi" id="solosi" class="form-control"
                                                value="{{ $penyakit->solosi }}">
                                        </div>

                                        @if (count($penyakit->media) > 0)
                                            <div class="row">
                                                @foreach ($penyakit->media as $media)
                                                    <div class="col">
                                                        <div>
                                                            <img class="img-fluid rounded"
                                                                src="{{ $media->getFullUrl() }}" />
                                                        </div>
                                                        <a href="{{ route('penyakit.hapusFoto', ['penyakit' => $penyakit->id, 'i' => $loop->index]) }}"
                                                            onClick="confirm('Hapus foto?')">Hapus</a>
                                                    </div>
                                                @endforeach
                                        @endif
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mb-2">
                                        <label for="gambar">gambar:</label>
                                        <span>
                                            <a href="#" class="btn btn-primary btn-sm rounded"
                                                id="add-image-field">Tambah</a>
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" name="gambar[]" id="gambar">

                                    <div class="images-container"></div>
                                </div>

                                <div class="form-group text-right">
                                    <input type="submit" value="upadate" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        let imagesContainer = document.querySelector('.images-container');
        let addButton = document.querySelector('#add-image-field');

        addButton.addEventListener('click', function(e) {
            e.preventDefault();

            let div = document.createElement('div');
            div.classList.add('form-group');
            div.classList.add('mt-1');

            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('name', 'gambar[]');
            input.setAttribute('class', 'form-control');

            div.appendChild(input);

            imagesContainer.appendChild(div);
        });
    </script>
@endsection
