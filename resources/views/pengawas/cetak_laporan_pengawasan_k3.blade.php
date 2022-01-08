<style type="text/css" media="all">
@include('partials.header');
table, td, th {
    border: 1px solid black;
}

table {
 border-collapse: collapse;
 width: 100%;
}

.table-no-border tr td th{
  border : none;
}

td {
    height: 50px;
    vertical-align: middle;
    text-align: center;
}

</style>

<table style="width:100%" class="table table-striped table-bordered table-hover">
    <thead>
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
