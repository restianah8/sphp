@extends('layout.template')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content mt-3">
        <div class="col-sm-3 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        <span class="count">17</span>
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
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown">
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
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                    </div>
                    <h4 class="mb-0">
                        <span class="count">60</span>
                    </h4>
                    <p class="text-light">Basis pengetahuan</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart2"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-4">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        </div>
                    </div>
                    <h4 class="mb-0">
                        <span class="count">18</span>
                    </h4>
                    <p class="text-light">Data Penguna</p>

                    <div class="chart-wrapper px-3" style="height:70px;" height="70">
                        <canvas id="widgetChart4"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <!--/.col-->

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelola Hasil Identifikasi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>

                                        <tr>
                                            <th>no </th>
                                            <th>Nama </th>
                                            <th>Alamat</th>
                                            <th>TGL Kunsoltasi</th>
                                            <th>Hama Dan Penyakit Penyerang</th>
                                            <th>Presentase</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->penguna->name ?? 'None' }}</td>
                                                <td>{{ $item->penguna->alamat ?? 'None' }}</td>

                                                <td>{{ $item->created_at }}</td>
                                                <td class="pl-3">
                                                    @if (count(getGejalaTertinggi($item->id)) > 1)
                                                        <ol>
                                                            @foreach (getGejalaTertinggi($item->id) as $it)
                                                                <li>{{ $it->penyakit->nama }}</li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        {{ getGejalaTertinggi($item->id)[0]->penyakit->nama }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (count(getGejalaTertinggi($item->id)) > 1)
                                                        <ol style="list-style: none">
                                                            @foreach (getGejalaTertinggi($item->id) as $it)
                                                                <li>{{ $it->persentase }}%</li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        {{ getGejalaTertinggi($item->id)[0]->persentase }}%
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="{{ route('riwayatA.hasil', $item->id) }}"
                                                        class="btn btn-sm btn-info text-white"> <i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('riwayatA.hapus', $item->id) }}"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data')"
                                                        class=" mb-2 fa fa-trash bg-danger p-2 text-white rounded"></a>

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
