@extends('layouts.pengawas_master')

@section('title')
Jadwal
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Pengawasan K3</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                   
                </div> -->
                <!-- Card Body -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor Surat Tugas</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal Surat Tugas</th>
                                    <th style="text-align: center; vertical-align: middle;">Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor PK</th>
                                    <th style="text-align: center; vertical-align: middle;">Lokasi</th>
                                    <th style="text-align: center; vertical-align: middle;">Titik Tumpu</th>
                                    <th style="text-align: center; vertical-align: middle;">Koordinat</th>
                                    <th style="text-align: center; vertical-align: middle;">Penyulang</th>
                                    <th style="text-align: center; vertical-align: middle;">Pelaksana</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas</th>
                                    <th style="text-align: center; vertical-align: middle;">Arsip Surat Tugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php $no=1 @endphp
                                @foreach($jadwal as $data)
                                <tr>
                                    <td>{{$no++ }}</td>
                                    <td>{{$data->no_surat_tugas }}</td>
                                    <td>{{date("j F Y", strtotime($data->tgl_surat_tugas))}}</td>
                                    <td>{{$data->pekerjaan }}</td>
                                    <td>{{$data->no_pk }}</td>
                                    <td>{{$data->lokasi }}</td>
                                    <td>{{$data->titik_tumpu }}</td>
                                    <td>{{$data->koordinat }}</td>
                                    <td>{{$data->penyulang }}</td>
                                    <td>{{$data->pelaksana }}</td>
                                    <td>{{$data->pengawas }}</td>
                                    <td>{{$data->arsip_surat_tugas }}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->


    </div>

</div>

@endsection('content')