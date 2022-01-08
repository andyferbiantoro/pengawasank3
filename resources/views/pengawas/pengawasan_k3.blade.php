@extends('layouts.pengawas_master')

@section('title')
Pengawasan K3
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengawasan K3</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengawasan K3</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                    <th colspan="3" style="text-align: center; vertical-align: middle;">Lokasi Pekerjaan</th>
                                    <th colspan="3" style="text-align: center; vertical-align: middle;">Personel Terkait</th>
                                    <th colspan="4" style="text-align: center; vertical-align: middle;">Kelengkapan Prosedur</th>
                                    <th colspan="2" style="text-align: center; vertical-align: middle;">Briefing Pelaksanaan</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Dokumentasi Briefing</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Dokumentasi Pelaksanaan Pekerjaan</th>
                                    <th colspan="2" style="text-align: center; vertical-align: middle;">Catatan Khusus </th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Aksi</th>
                                    <th style="display: none;">hidden</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">Area/Rayon</th>
                                    <th style="text-align: center; vertical-align: middle;">Daerah Padam</th>
                                    <th style="text-align: center; vertical-align: middle;">Titik Tumpu Gardu</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas Pekerjaan dan K3 (PLN)</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengawas Pekerjaan dan K3 (Vendor)</th>
                                    <th style="text-align: center; vertical-align: middle;">Jumlah Petugas Pelaksana</th>
                                    <th style="text-align: center; vertical-align: middle;">SOP</th>
                                    <th style="text-align: center; vertical-align: middle;">IBPR</th>
                                    <th style="text-align: center; vertical-align: middle;">JSA</th>
                                    <th style="text-align: center; vertical-align: middle;">Working Permit</th>
                                    <th style="text-align: center; vertical-align: middle;">Arahan Pekerja</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengecekan Komunikasi</th>
                                    <th style="text-align: center; vertical-align: middle;">Unsafe Action</th>
                                    <th style="text-align: center; vertical-align: middle;">Unsafe Condition</th>
                                    <th style="display: none;">hidden</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1 @endphp
                                @foreach($data_pengawasan_k3 as $data)
                                <tr>
                                    <td style="text-align: center;">{{$no++ }}</td>
                                    <td style="text-align: center;">{{$data->area }}</td>
                                    <td style="text-align: center;">{{$data->daerah_padam }}</td>
                                    <td style="text-align: center;">{{$data->titik_lampu_gardu }}</td>
                                    <td style="text-align: center;">{{$data->pengawas_k3 }}</td>
                                    <td style="text-align: center;">{{$data->pengawas_vendor }}</td>
                                    <td style="text-align: center;">{{$data->jml_petugas }}</td>
                                    <td style="text-align: center;">{{$data->sop }}</td>
                                    <td style="text-align: center;">{{$data->ibpr }}</td>
                                    <td style="text-align: center;">{{$data->jsa }}</td>
                                    <td style="text-align: center;">{{$data->working_permit }}</td>
                                    <td style="text-align: center;">{{$data->arahan_pekerja }}</td>
                                    <td style="text-align: center;">{{$data->pengecekan_komunikasi }}</td>
                                    <td style="text-align: center;">{{$data->dok_brief }}</td>
                                    <td style="text-align: center;">{{$data->dok_pelaksanaan }}</td>
                                    <td style="text-align: center;">{{$data->unsafe_action }}</td>
                                    <td style="text-align: center;">{{$data->unsafe_kondisi }}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-warning btn-sm fa fa-edit edit" title="Edit"></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengawasan K3</h5>

            </div>
            <div class="modal-body">
                 <form class="form-material" method="post" action="{{route('pengawas_pengawasan_k3_add')}}" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="form-group">
                        <label>List Pekerjaan</label>
                        <select type="text" class="form-control" id="id_jadwal_pengawasan" name="id_jadwal_pengawasan" required="">
                            <option selected disabled> -- Pilih Pekerjaan -- </option>
                            @foreach($list_pekerjaan as $data)
                            <option value="{{$data->id}}">{{$data->pekerjaan}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Pekerjaan</label>
                        <input type="text" required class="form-control" id="area" name="area" placeholder="Area/Rayon"><br>
                        <input type="text" required class="form-control" id="daerah_padam" name="daerah_padam" placeholder="Daerah Padam"><br>
                        <input type="text" required class="form-control" id="titik_lampu_gardu" name="titik_lampu_gardu" placeholder="Titik Tumpu Gardu">
                    </div>
                    <div class="form-group">
                        <label>Personel Terkait</label>
                        <input type="text" required class="form-control" id="pengawas_k3" name="pengawas_k3" placeholder="Pengawas Pekerjaan & K3 (PLN)"><br>
                        <input type="text" required class="form-control" id="pengawas_vendor" name="pengawas_vendor" placeholder="Pengawas Pekerjaan & K3 (Vendor)"><br>
                        <input type="number" required class="form-control" id="jml_petugas" name="jml_petugas" placeholder="Jumlah Petugas Pelaksana">
                    </div>
                    <div class="form-group">
                        <label>Kelengkapan Prosedur</label>
                       
                        <div class="row">
                            <div class="col">
                            <label>SOP</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="sop" id="sop" value="Ada">
                                    <label class="form-check-label" for="sop1" >
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="sop" id="sop" value="Tidak Ada">
                                    <label class="form-check-label" for="sop2">
                                       Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>IBPR</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="ibpr" id="ibpr" value="Ada">
                                    <label class="form-check-label" for="ibpr1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="ibpr" id="ibpr" value="Tidak Ada">
                                    <label class="form-check-label" for="ibpr2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                       <br>
                        <div class="row">
                            <div class="col">
                            <label>JSA</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="jsa" id="jsa1" value="Ada">
                                    <label class="form-check-label" for="jsa1" >
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="jsa" id="jsa2" value="Tidak Ada">
                                    <label class="form-check-label" for="jsa2">
                                       Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>Working Permit</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="working_permit" id="working_permit" value="Ada">
                                    <label class="form-check-label" for="wp1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="working_permit" id="working_permit" value="Tidak Ada">
                                    <label class="form-check-label" for="wp2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Briefing Pelaksanaan</label>
                       
                        <div class="row">
                            <div class="col">
                            <label>Arahan Pekerja</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="arahan_pekerja" id="arahan1" value="Dilaksanakan">
                                    <label class="form-check-label" for="arahan1" >
                                        Dilaksanakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="arahan_pekerja" id="arahan2" value="Tidak Dilaksanakan">
                                    <label class="form-check-label" for="arahan2">
                                       Tidak Dilaksanakan
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>Pengecekan Komunikasi</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="pengecekan_komunikasi" id="pengecekan_komunikasi" value="Dilaksanakan">
                                    <label class="form-check-label" for="pengecekan_komunikasi">
                                    Dilaksanakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="pengecekan_komunikasi" id="pengecekan_komunikasi" value="Tidak Dilaksanakan">
                                    <label class="form-check-label" for="pengecekan_komunikasi">
                                        Tidak Dilaksanakan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dokumentasi Briefing</label>
                        <input type="file" required class="form-control" id="dok_brief" name="dok_brief" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi Pelaksanaan Pekerjaan</label>
                        <input type="file" required class="form-control" id="dok_pelaksanaan" name="dok_pelaksanaan" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Catatan Khusus</label>
                        <input type="text" required class="form-control" id="unsafe_action" name="unsafe_action" placeholder="Unsafe Action"><br>
                        <input type="text" required class="form-control" id="unsafe_kondisi" name="unsafe_kondisi" placeholder="Unsafe Condition">
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
                        <label>Lokasi Pekerjaan</label>
                        <input type="text" required class="form-control" id="area_update" name="area" placeholder="Area/Rayon"><br>
                        <input type="text" required class="form-control" id="daerah_padam_update" name="daerah_padam" placeholder="Daerah Padam"><br>
                        <input type="text" required class="form-control" id="titik_lampu_gardu_update" name="titik_lampu_gardu" placeholder="Titik Tumpu Gardu">
                    </div>
                    <div class="form-group">
                        <label>Personel Terkait</label>
                        <input type="text" required class="form-control" id="pengawas_k3_update" name="pengawas_k3" placeholder="Pengawas Pekerjaan & K3 (PLN)"><br>
                        <input type="text" required class="form-control" id="pengawas_vendor_update" name="pengawas_vendor" placeholder="Pengawas Pekerjaan & K3 (Vendor)"><br>
                        <input type="number" required class="form-control" id="jml_petugas_update" name="jml_petugas" placeholder="Jumlah Petugas Pelaksana">
                    </div>
                    <div class="form-group">
                        <label>Kelengkapan Prosedur</label>
                       
                        <div class="row">
                            <div class="col">
                            <label>SOP</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="sop" id="sop_update" value="Ada" <?php if ($data->sop == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="sop1" >
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="sop" id="sop_update" value="Tidak Ada" <?php if ($data->sop == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="sop2">
                                       Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>IBPR</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="ibpr" id="ibpr_update" value="Ada" <?php if ($data->ibpr == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="ibpr1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="ibpr" id="ibpr_update" value="Tidak Ada" <?php if ($data->ibpr == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="ibpr2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                       <br>
                        <div class="row">
                            <div class="col">
                            <label>JSA</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="jsa" id="jsa1_update" value="Ada" <?php if ($data->jsa == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="jsa1" >
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="jsa" id="jsa2_update" value="Tidak Ada" <?php if ($data->jsa == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="jsa2">
                                       Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>Working Permit</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="working_permit" id="working_permit" value="Ada" <?php if ($data->working_permit == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="wp1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="working_permit" id="working_permit" value="Tidak Ada" <?php if ($data->working_permit == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="wp2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Briefing Pelaksanaan</label>
                       
                        <div class="row">
                            <div class="col">
                            <label>Arahan Pekerja</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="arahan_pekerja" id="arahan1_update" value="Dilaksanakan" <?php if ($data->arahan_pekerja == 'Dilaksanakan') echo 'checked' ?>>
                                    <label class="form-check-label" for="arahan1" >
                                        Dilaksanakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="arahan_pekerja" id="arahan2_update" value="Tidak Dilaksanakan" <?php if ($data->arahan_pekerja == 'Tidak Dilaksanakan') echo 'checked' ?>>
                                    <label class="form-check-label" for="arahan2">
                                       Tidak Dilaksanakan
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                            <label>Pengecekan Komunikasi</label>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="pengecekan_komunikasi" id="pengecekan_komunikasi" value="Dilaksanakan" <?php if ($data->pengecekan_komunikasi == 'Dilaksanakan') echo 'checked' ?>>
                                    <label class="form-check-label" for="pengecekan_komunikasi">
                                    Dilaksanakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input" type="radio" name="pengecekan_komunikasi" id="pengecekan_komunikasi_update" value="Tidak Dilaksanakan" <?php if ($data->pengecekan_komunikasi == 'Tidak Dilaksanakan') echo 'checked' ?>>
                                    <label class="form-check-label" for="pengecekan_komunikasi">
                                        Tidak Dilaksanakan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dokumentasi Briefing</label>
                        <input type="file"  class="form-control" id="dok_brief" name="dok_brief" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi Pelaksanaan Pekerjaan</label>
                        <input type="file"  class="form-control" id="dok_pelaksanaan" name="dok_pelaksanaan" placeholder="">
                    </div>

                    <div class="form-group">
                        <label>Catatan Khusus</label>
                        <input type="text" required class="form-control" id="unsafe_action_update" name="unsafe_action" placeholder="Unsafe Action"><br>
                        <input type="text" required class="form-control" id="unsafe_kondisi_update" name="unsafe_kondisi" placeholder="Unsafe Condition">
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
    var url = '{{route("pengawas_pengawasan_k3_delete", ":id") }}';
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
      $('#area_update').val(data[1]);
      $('#daerah_padam_update').val(data[2]);
      $('#titik_lampu_gardu_update').val(data[3]);
      $('#pengawas_k3_update').val(data[4]);
      $('#pengawas_vendor_update').val(data[5]);
      $('#jml_petugas_update').val(data[6]);
      $('#unsafe_action_update').val(data[15]);
      $('#unsafe_kondisi_update').val(data[16]);
      
      $('#updateModalform').attr('action','pengawas_pengawasan_k3_update/'+ data[18]);
      $('#updateModal').modal('show');
    });
  });
</script>

@endsection