@extends('layouts.pimpinan_master')

@section('title')
Laporan Pengawasan K3
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pengawasan K3</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengawasan K3</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">No</th>
                                    <th style="text-align: center; vertical-align: middle;">Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Pelaksana Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Nomor Perintah Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Tanggal Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Waktu Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Lokasi Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas PLN</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas Vendor</th>
                                    <th style="text-align: center; vertical-align: middle;">Jumlah Petugas Pelaksana</th>
                                    <th style="text-align: center; vertical-align: middle;">SOP</th>
                                    <th style="text-align: center; vertical-align: middle;">IPBR</th>
                                    <th style="text-align: center; vertical-align: middle;">JSA</th>
                                    <th style="text-align: center; vertical-align: middle;">Working Permit</th>
                                    <th style="text-align: center; vertical-align: middle;">Arahan Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Cek Komunikasi</th>
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