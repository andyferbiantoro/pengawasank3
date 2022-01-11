@extends('layouts.pengawas_master')

@section('title')
Edit Checklist Peralatan
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Peralatan</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Peralatan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                   @foreach($data_peralatan as $data)
                   <form action="{{route('pengawas_checklist_peralatan_update',$data->id)}}" method="post" enctype="multipart/form-data">
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
                                <label>Nama Peralatan Penunjang</label>
                                <select type="text" class="form-control" id="id_prodi" name="id_prodi_tujuan" required="">
                                    @foreach($list_peralatan as $data_per)
                                    <option value="{{$data_per->id}}" {{$data->id_peralatan == $data_per->id ? "selected" : "" }}>{{$data_per->nama_peralatan}}</option>
                                    @endforeach
                                </select><br>
                                <input type="number" required class="form-control" id="jumlah_update" name="jumlah" placeholder="Jumlah" value="{{$data->jumlah}}"><br>
                                <input type="text" required class="form-control" id="sat_update" name="sat" placeholder="Satuan" value="{{$data->sat}}"><br>
                            </div>
                            <div class="form-group">
                                <label>Status Alat</label>

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
                                            <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah1" value="Ada" <?php if ($data->hasil_setelah == 'Ada') echo 'checked' ?> >
                                            <label class="form-check-label" for="hasil_setelah1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah2" value="Tidak Ada" <?php if ($data->hasil_setelah == 'Tidak Ada') echo 'checked' ?> >
                                            <label class="form-check-label" for="hasil_setelah2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" required class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{$data->keterangan}}"><br>
                                </div>

                                <div class="form-group">
                                    <label>Dokumentasi Pemasangan Alat</label>
                                    <input type="file"  class="form-control" id="dok_pemasangan" name="dok_pemasangan" placeholder=""><br>
                                </div>
                            </div>

                            <a href="{{route('pengawas_checklist_peralatan')}}"> <button type="button" class="btn btn-danger float-right">Kembali</button></a>
                            <button type="submit" class="btn btn-primary float-right mr-2">Perbarui</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pie Chart -->


</div>

</div>



@endsection('content')

