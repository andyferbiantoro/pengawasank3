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

    </tr>
</thead>
<tbody>
    @php $no=1 @endphp
    @foreach($data_pengawasan as $data)
    <tr>
        <td style="text-align: center;">{{$no++}}</td>
        <td style="text-align: center;">{{$data->hari_tgl }}</td>
        <td style="text-align: center;">{{$data->no_surat_tugas }}</td>
        <td style="text-align: center;">{{$data->no_pk }}</td>
        <td style="text-align: center;">{{$data->pekerjaan }}</td>
        <td style="text-align: center;">-- VOLUME --</td>
        <td style="text-align: center;">{{$data->lokasi }}</td>
        <td style="text-align: center;">{{$data->titik_tumpu }}</td>
        <td style="text-align: center;">{{$data->penyulang }}</td>
        <td style="text-align: center;">-- UNIT --</td>
        <td style="text-align: center;">{{$data->koordinat }}</td>
        <td style="text-align: center;">{{$data->pelaksana }}</td>
        
    </tr>
    @endforeach
</tbody>
</table>
<br><br>


<table style="width:100%" class="table table-striped table-bordered table-hover">
   <thead class="thead-light">
    <tr>
        <th style="text-align: center; vertical-align: middle;">No</th>
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
    @php $no=1 @endphp
    @foreach($data_pengawasan as $data)
    <tr>
        <td style="text-align: center;">{{$no++}}</td>
        <td style="text-align: center;">{{$data->pengawas }}</td>
        <td style="text-align: center;">{{$data->no_surat_tugas }}</td>
        <td style="text-align: center;">{{$data->arsip_surat_tugas }}</td>
        <td style="text-align: center;">{{$data->wkt_pekerjaan_awal }}</td>
        <td style="text-align: center;">{{$data->wkt_pekerjaan_akhir }}</td>
        <td style="text-align: center;">{{$data->dok_brief }}</td>
        @if($data->id_peralatan == 2)
        <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
        @else
        <td style="text-align: center;">kosong</td>
        @endif

        @if($data->id_peralatan == 7)
        <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
        @else
        <td style="text-align: center;">kosong</td>
        @endif

        @if($data->id_peralatan == 4)
        <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
        @else
        <td style="text-align: center;">kosong</td>
        @endif

        @if($data->id_peralatan == 7)
        <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
        @else
        <td style="text-align: center;">kosong</td>
        @endif

        @if($data->id_peralatan == 3)
        <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
        @else
        <td style="text-align: center;">kosong</td> 
        @endif  

        <td style="text-align: center;">{{$data->keterangan }}</td>
    </tr>
    @endforeach
</tbody>
</table>
