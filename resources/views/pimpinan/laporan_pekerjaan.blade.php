@extends('layouts.pimpinan_master')

@section('title')
Laporan Pekerjaan
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pekerjaan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Download PDF</a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor Surat Tugas</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor PK</th>
                                    <th style="text-align: center; vertical-align: middle;">Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Volume</th>
                                    <th style="text-align: center; vertical-align: middle;">Lokasi</th>
                                    <th style="text-align: center; vertical-align: middle;">Titik Tumpu</th>
                                    <th style="text-align: center; vertical-align: middle;">Penyulang</th>
                                    <th style="text-align: center; vertical-align: middle;">Unit</th>
                                    <th style="text-align: center; vertical-align: middle;">Koordinat</th>
                                    <th style="text-align: center; vertical-align: middle;">Pelaksana</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor Surat Tugas</th>
                                    <th style="text-align: center; vertical-align: middle;">Arsip Surat Tugas</th>
                                    <th style="text-align: center; vertical-align: middle;">Waktu Pelaksanaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Selesai Pelaksanaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Breafing</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Pasang Grounding</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Pasang Papan Peringatan</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Pengamanan Area</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Pemasangan Tangga</th>
                                    <th style="text-align: center; vertical-align: middle;">Dok. Pelaksanaan Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                </tr>
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