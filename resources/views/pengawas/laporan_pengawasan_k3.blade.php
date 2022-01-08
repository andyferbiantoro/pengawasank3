@extends('layouts.pengawas_master')

@section('title')
Laporan Pengawasan K3
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pengawasan K3</h1>
        <a href="{{route('pengawas_laporan_pengawasan_k3_cetak')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Download PDF</a>
       <!--  <button class="btn btn-success" onclick="print('printPDF')">Cetak PDF</button> -->
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
                        <div id="printPDF">
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
                                    @php $no=1 @endphp
                                    @foreach($data_pengawasan as $data)
                                    <tr>
                                        <td style="text-align: center;">{{$no++ }}</td>
                                        <td style="text-align: center;">{{$data->pekerjaan }}</td>
                                        <td style="text-align: center;">{{$data->plk_pekerjaan }}</td>
                                        <td style="text-align: center;">{{$data->no_pk }}</td>
                                        <td style="text-align: center;">{{$data->hari_tgl }}</td>
                                        <td style="text-align: center;">{{$data->wkt_pekerjaan_awal }} - {{$data->wkt_pekerjaan_akhir }} </td>
                                        <td style="text-align: center;">{{$data->area }}</td>
                                        <td style="text-align: center;">{{$data->pengawas_k3 }}</td>
                                        <td style="text-align: center;">{{$data->pengawas_vendor }}</td>
                                        <td style="text-align: center;">{{$data->jml_petugas }}</td>
                                        <td style="text-align: center;">{{$data->sop }}</td>
                                        <td style="text-align: center;">{{$data->ibpr }}</td>
                                        <td style="text-align: center;">{{$data->jsa }}</td>
                                        <td style="text-align: center;">{{$data->working_permit }}</td>
                                        <td style="text-align: center;">{{$data->arahan_pekerja }}</td>
                                        <td style="text-align: center;">{{$data->pengecekan_komunikasi }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->


    </div>

</div>

@endsection('content')

@section('scripts')

<script type="text/javascript">
  function print(elem) {
    var mywindow = window.open('', 'PRINT', 'height=1000,width=1200');

    mywindow.document.write('<html><head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1 class="text-center">' + 'Laporan Pendapatan' + '</h1>');
    mywindow.document.write('<br><br>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    // mywindow.close();

    return true;

}
</script>

@endsection