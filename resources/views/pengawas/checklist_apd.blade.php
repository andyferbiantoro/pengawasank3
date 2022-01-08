@extends('layouts.pengawas_master')

@section('title')
Checklist APD
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alat Pelindung Diri</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data APD</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Personel</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Peralatan</th>
                                    <th colspan="3" style="text-align: center; vertical-align: middle;">Personel Terkait</th>
                                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Aksi</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">Sebelum Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Saat Pekerjaan</th>
                                    <th style="text-align: center; vertical-align: middle;">Sesudah Pekerjaan</th>
                                    <th style="display: none;">hidden</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $no=1 @endphp
                               @foreach($data_apd as $data)
                                <tr>
                                    <td style="text-align: center;">{{$no++ }}</td>
                                    <td style="text-align: center;">{{$data->nama_personel }}</td>
                                    <td style="text-align: center;">{{$data->nama_apd }}</td>
                                    <td style="text-align: center;">{{$data->hasil_sebelum }}</td>
                                    <td style="text-align: center;">{{$data->hasil_saat }}</td>
                                    <td style="text-align: center;">{{$data->hasil_setelah }}</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alat Pelindung Diri</h5>

            </div>
            <div class="modal-body">
                 <form class="form-material" method="post" action="{{route('pengawas_checklist_apd_add')}}" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="form-group">
                        <label>List Pekerjaan</label>
                        <select type="text" class="form-control" id="id_pekerjaan" name="id_pekerjaan" required="">
                            <option selected disabled> -- Pilih Pekerjaan -- </option>
                            @foreach($list_pekerjaan as $data)
                            <option value="{{$data->id}}">{{$data->pekerjaan}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label>Nama Personel</label>
                        <input type="text" required class="form-control" id="nama_personel" name="nama_personel" placeholder="Area/Rayon">
                    </div>
                    <div class="form-group">
                        <label>Nama Peralatan</label>
                        <select type="text" class="form-control" id="id_apd" name="id_apd" required="">
                            <option selected disabled> -- Pilih Nama APD -- </option>
                            @foreach($list_apd as $data)
                            <option value="{{$data->id}}">{{$data->nama_apd}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label>Personel Terkait</label>

                        <div class="row">
                            <div class="col">
                                <label>Sebelum Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum1" value="Ada">
                                    <label class="form-check-label" for="hasil_sebelum1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum2" value="Tidak Ada">
                                    <label class="form-check-label" for="hasil_sebelum2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label>Saat Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat1" value="Ada">
                                    <label class="form-check-label" for="hasil_saat1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat2" value="Tidak Ada">
                                    <label class="form-check-label" for="hasil_saat2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label>Setelah Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah1" value="Ada">
                                    <label class="form-check-label" for="hasil_setelah1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah2" value="Tidak Ada">
                                    <label class="form-check-label" for="hasil_setelah2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


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
                        <label>Nama Personel</label>
                        <input type="text" required class="form-control" id="nama_personel_update" name="nama_personel" placeholder="Area/Rayon">
                    </div>
                    <div class="form-group">
                        <label>Nama Peralatan</label>
                        <input type="text" required class="form-control" id="nama_apd_update" name="nama_apd" placeholder="Pengawas Pekerjaan & K3 (PLN)">
                    </div>
                    <div class="form-group">
                        <label>Personel Terkait</label>

                        <div class="row">
                            <div class="col">
                                <label>Sebelum Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum1" value="Ada" <?php if ($data->hasil_sebelum == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_sebelum1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum2" value="Tidak Ada" <?php if ($data->hasil_sebelum == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_sebelum2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label>Saat Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat1" value="Ada" <?php if ($data->hasil_saat == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_saat1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat2" value="Tidak Ada" <?php if ($data->hasil_saat == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_saat2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <label>Setelah Pekerjaan</label>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah1" value="Ada" <?php if ($data->hasil_setelah == 'Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_setelah1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah2" value="Tidak Ada" <?php if ($data->hasil_setelah == 'Tidak Ada') echo 'checked' ?>>
                                    <label class="form-check-label" for="hasil_setelah2">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
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
    var url = '{{route("pengawas_checklist_apd_delete", ":id") }}';
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
      $('#nama_personel_update').val(data[1]);
      $('#nama_apd_update').val(data[2]);
     
      $('#updateModalform').attr('action','pengawas_checklist_apd_update/'+ data[7]);
      $('#updateModal').modal('show');
    });
  });
</script>

@endsection
