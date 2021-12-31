@extends('layouts.petugas_master')

@section('title')
Jadwal Pengawasan K3
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Pengawasan K3</h1>
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
                                    <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                    <th style="display: none;">hidden</th>
                                    <th style="display: none;">hidden</th>
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
                                    <td>
                                        <button class="btn btn-success btn-sm fa fa-edit edit" title="Edit"></button>

                                        <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                                            <button class="fa fa-trash btn-danger btn-sm " title="Hapus"></button>
                                        </a>
                                    </td>
                                    <td style="display: none;">{{$data->tgl_surat_tugas}}</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>

            </div>
            <div class="modal-body">
                <form class="form-material"  action="{{route('petugas_jadwal_add')}}" method="post" enctype="multipart/form-data">
                   {{csrf_field()}}

                   <div class="form-group">
                        <label>Level Pekerjaan</label>
                        <select type="text" class="form-control" id="level" name="level" required="">
                            <option selected disabled> -- Pilih Level -- </option>
                            <option value="1">Sangat Penting</option>
                            <option value="2">Penting</option>
                            <option value="3">Bisa di Kesampingkan</option>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label>Nomor Surat Tugas</label>
                        <input type="text" required class="form-control" id="no_surat_tugas" name="no_surat_tugas" placeholder="Nomor Surat Tugas">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat Tugas</label>
                        <input type="date" required class="form-control" id="tgl_surat_tugas" name="tgl_surat_tugas" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" required class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Nomor PK</label>
                        <input type="text" required class="form-control" id="no_pk" name="no_pk" placeholder="Nomor PK">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" required class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                    <div class="form-group">
                        <label>Titik Tumpu</label>
                        <input type="text" required class="form-control" id="titik_tumpu" name="titik_tumpu" placeholder="Titik Tumpu">
                    </div>
                    <div class="form-group">
                        <label>Koordinat</label>
                        <input type="text" required class="form-control" id="koordinat" name="koordinat" placeholder="Koordinat">
                    </div>
                    <div class="form-group">
                        <label>Penyulang</label>
                        <input type="text" required class="form-control" id="penyulang" name="penyulang" placeholder="Penyulang">
                    </div>
                    <div class="form-group">
                        <label>Pelaksana</label>
                        <input type="text" required class="form-control" id="pelaksana" name="pelaksana" placeholder="Pelaksana">
                    </div>
                    <div class="form-group">
                        <label>Pengawas</label>
                        <input type="text" required class="form-control" id="pengawas" name="pengawas" placeholder="Pengawas">
                    </div>
                    <div class="form-group">
                        <label>Arsip Surat Tugas</label>
                        <input type="file" required class="form-control" id="arsip_surat_tugas" name="arsip_surat_tugas" placeholder="">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::user()->id }}" />
                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                    <button type="button" style="margin-left: 3px;" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
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
            <h5 class="modal-title">Anda yakin ingin memperbarui Data Menu ini ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}

                    <div class="form-group">
                        <label>Nomor Surat Tugas</label>
                        <input type="text" required class="form-control" id="no_surat_tugas_update" name="no_surat_tugas" placeholder="Nomor Surat Tugas">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat Tugas</label>
                        <input type="date" required class="form-control" id="tgl_surat_tugas_update" name="tgl_surat_tugas" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" required class="form-control" id="pekerjaan_update" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Nomor PK</label>
                        <input type="text" required class="form-control" id="no_pk_update" name="no_pk" placeholder="Nomor PK">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" required class="form-control" id="lokasi_update" name="lokasi" placeholder="Lokasi">
                    </div>
                    <div class="form-group">
                        <label>Titik Tumpu</label>
                        <input type="text" required class="form-control" id="titik_tumpu_update" name="titik_tumpu" placeholder="Titik Tumpu">
                    </div>
                    <div class="form-group">
                        <label>Koordinat</label>
                        <input type="text" required class="form-control" id="koordinat_update" name="koordinat" placeholder="Koordinat">
                    </div>
                    <div class="form-group">
                        <label>Penyulang</label>
                        <input type="text" required class="form-control" id="penyulang_update" name="penyulang" placeholder="Penyulang">
                    </div>
                    <div class="form-group">
                        <label>Pelaksana</label>
                        <input type="text" required class="form-control" id="pelaksana_update" name="pelaksana" placeholder="Pelaksana">
                    </div>
                    <div class="form-group">
                        <label>Pengawas</label>
                        <input type="text" required class="form-control" id="pengawas_update" name="pengawas" placeholder="Pengawas">
                    </div>
                    <div class="form-group">
                        <label>Arsip Surat Tugas</label>
                        <input type="file"  class="form-control" id="arsip_surat_tugas" name="arsip_surat_tugas" placeholder="">
                    </div>


      <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
      <button type="submit"  class="btn btn-primary float-right mr-2" >Perbarui</button>
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
    var url = '{{route("petugas_jadwal_delete", ":id") }}';
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
      $('#no_surat_tugas_update').val(data[1]);
      $('#tgl_surat_tugas_update').val(data[13]);
      $('#pekerjaan_update').val(data[3]);
      $('#no_pk_update').val(data[4]);
      $('#lokasi_update').val(data[5]);
      $('#titik_tumpu_update').val(data[6]);
      $('#koordinat_update').val(data[7]);
      $('#penyulang_update').val(data[8]);
      $('#pelaksana_update').val(data[9]);
      $('#pengawas_update').val(data[10]);
      $('#updateModalform').attr('action','petugas_jadwal_update/'+ data[14]);
      $('#updateModal').modal('show');
    });
  });
</script>

@endsection