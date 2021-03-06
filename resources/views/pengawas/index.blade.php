@extends('layouts.pengawas_master')

@section('title')
Dashboard Pengawas
@endsection

@section('content')



<div class="container-fluid">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                   
                </div> -->
                <!-- Card Body -->
                <div class="card-body text-center">
                    Selamat Datang di Aplikasi Pengawasan K3
                </div>
                         <div class="table-responsive">
                        <div id="printPDF">
                            <table id="dataTable" class="table table-hover table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle;">No</th>
                                        <th style="text-align: center; vertical-align: middle;">Pekerjaan</th>
                                        <th style="text-align: center; vertical-align: middle;">Lokasi</th>
                                        <th style="text-align: center; vertical-align: middle;">Tanggal Surat Tugas</th>
                                        <th style="text-align: center; vertical-align: middle;">Level</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach($jadwal as $data)
                                    <tr>
                                        <td style="text-align: center;">{{$no++ }}</td>
                                        <td style="text-align: center;">{{$data->pekerjaan }}</td>
                                        <td style="text-align: center;">{{$data->lokasi }}</td>
                                        <td style="text-align: center;">{{date("j F Y", strtotime($data->tgl_surat_tugas))}}</td>
                                        @if($data->level == 1)
                                        <td style="text-align: center;">
                                           <a href="{{route('pengawas_pekerjaan')}}">  <button class="btn btn-sm btn-danger">Prioritas 1</button></a>
                                        </td>
                                        @endif

                                        @if($data->level == 2)
                                        <td style="text-align: center;">
                                             <a href="{{route('pengawas_pekerjaan')}}"><button class="btn btn-sm btn-warning">Prioritas 2</button></a>
                                        </td>
                                        @endif

                                        @if($data->level == 3)
                                        <td style="text-align: center;">
                                            <a href="{{route('pengawas_pekerjaan')}}"><button class="btn btn-sm btn-success">Prioritas 3</button></a>
                                        </td>
                                        @endif
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