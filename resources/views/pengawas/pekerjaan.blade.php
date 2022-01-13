@extends('layouts.pengawas_master')

@section('title')
Pekerjaan
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pekerjaan</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
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
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pekerjaan</h6>

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
                                    <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                    <th style="display: none;">hidden</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1 @endphp
                                @foreach($data_pekerjaan as $data)
                                <tr>
                                    <td style="text-align: center;">{{$no++ }}</td>
                                    <td style="text-align: center;">{{$data->pekerjaan }}</td>
                                    <td style="text-align: center;">{{$data->plk_pekerjaan }}</td>
                                    <td style="text-align: center;">{{$data->no_pk }}</td>
                                    <td style="text-align: center;">{{date("j F Y", strtotime($data->hari_tgl))}}</td>
                                    <td style="text-align: center;">{{date("H:i", strtotime($data->wkt_pekerjaan_awal))}} - {{date("H:i", strtotime($data->wkt_pekerjaan_akhir))}} WIB</td>
                                    <td style="text-align: center;">
                                      <!--   <button class="btn btn-warning btn-sm fa fa-edit edit" data-toggle="modal" data-target="#updateModal" title="Edit"></button> -->
                                        <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                                            <button class="fa fa-trash btn-danger btn-sm " title="Hapus"></button>
                                        </a>

                                    </td>
                                    <td style="display: none;">{{$data->id}}</td>
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


<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pekerjaan</h5>

            </div>
            <div class="modal-body">
                <form class="form-material" method="post" action="{{route('pengawas_pekerjaan_add')}}" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Jadwal Pengawasan</label>
                        <select type="text" class="form-control" id="id_jadwal_pengawasan" name="id_jadwal_pengawasan" required="">
                            <option selected disabled> -- Pilih Jadwal -- </option>
                            @foreach($list_jadwal as $data)
                            <option value="{{$data->id}}">{{$data->tgl_surat_tugas}}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" required class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Pelaksana Pekerjaan</label>
                        <input type="text" required class="form-control" id="plk_pekerjaan" name="plk_pekerjaan" placeholder="Pelaksana Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Nomor Perintah Pekerjaan</label>
                        <input type="text" required class="form-control" id="no_pk" name="no_pk" placeholder="Nomor Perintah Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pekerjaan</label>
                        <input type="date" required class="form-control" id="hari_tgl" name="hari_tgl" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Waktu Pekerjaan Awal</label>
                        <input type="time" required class="form-control" id="wkt_pekerjaan_awal" name="wkt_pekerjaan_awal" placeholder="Waktu Awal">
                    </div>
                    <div class="form-group">
                        <label>Waktu Pekerjaan Akhir</label>
                        <input type="time" required class="form-control" id="wkt_pekerjaan_akhir" name="wkt_pekerjaan_akhir" placeholder="Waktu Awal">
                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary float-right mr-2">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!--Modal content-->
        <form action="" id="updateModalform" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Anda yakin ingin memperbarui Data ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                   <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" required class="form-control" id="pekerjaan_update" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Pelaksana Pekerjaan</label>
                        <input type="text" required class="form-control" id="plk_pekerjaan_update" name="plk_pekerjaan" placeholder="Pelaksana Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Nomor Perintah Pekerjaan</label>
                        <input type="text" required class="form-control" id="no_pk_update" name="no_pk" placeholder="Nomor Perintah Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pekerjaan</label>
                        <input type="date"  class="form-control" id="hari_tgl_update" name="hari_tgl" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Waktu Pekerjaan Awal</label>
                        <input type="time"  class="form-control" id="wkt_pekerjaan_awal_update" name="wkt_pekerjaan_awal" placeholder="Waktu Awal">
                    </div>
                    <div class="form-group">
                        <label>Waktu Pekerjaan Akhir</label>
                        <input type="time"  class="form-control" id="wkt_pekerjaan_akhir_update" name="wkt_pekerjaan_akhir" placeholder="Waktu Awal">
                    </div>

                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary float-right mr-2">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p>Apakah anda yakin ingin Menghapus data ini ?</p>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                    <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content')


@section('scripts')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{route("pengawas_pekerjaan_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>


<script>
  $(document).ready(function() {
    var table = $('#dataTable').DataTable();
    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);
      $('#pekerjaan_update').val(data[1]);
      $('#plk_pekerjaan_update').val(data[2]);
      $('#no_pk_update').val(data[3]);
     
      $('#updateModalform').attr('action','pengawas_pekerjaan_update/'+ data[7]);
      $('#updateModal').modal('show');
    });
  });
</script>

@endsection