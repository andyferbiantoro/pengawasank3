@extends('layouts.pengawas_master')

@section('title')
Edit Checklist APD
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Alat Pelindung Diri</h1>
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
                   @foreach($data_apd as $data)
                   <form action="{{route('pengawas_checklist_apd_update',$data->id)}}"  method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Anda yakin ingin memperbarui Data ini ?</h5>
                          
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}


                            <div class="form-group">
                                <label>Nama Personel</label>
                                <input type="text" required class="form-control" id="nama_personel_update" name="nama_personel" value="{{$data->nama_personel}}">
                            </div>
                            <div class="form-group">
                                <label>Nama Peralatan</label>
                                <select type="text" class="form-control" id="id_apd" name="id_apd" required="" >
                                    <option selected disabled> -- Pilih Nama APD -- </option>
                                    @foreach($list_apd as $list_data)
                                    <option value="{{$list_data->id}}">{{$list_data->nama_apd}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="form-group">
                                <label>Personel Terkait</label>

                                <div class="row">
                                    <div class="col">
                                        <label>Sebelum Pekerjaan</label>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum1_update" value="Ada" <?php if ($data->hasil_sebelum == 'Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_sebelum1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_sebelum" id="hasil_sebelum2_update" value="Tidak Ada" <?php if ($data->hasil_sebelum == 'Tidak Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_sebelum2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Saat Pekerjaan</label>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat1_update" value="Ada" <?php if ($data->hasil_saat == 'Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_saat1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_saat" id="hasil_saat2_update" value="Tidak Ada" <?php if ($data->hasil_saat == 'Tidak Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_saat2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Setelah Pekerjaan</label>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah1_update" value="Ada" <?php if ($data->hasil_setelah == 'Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_setelah1">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="hasil_setelah" id="hasil_setelah2_update" value="Tidak Ada" <?php if ($data->hasil_setelah == 'Tidak Ada') echo 'checked' ?>>
                                            <label class="form-check-label" for="hasil_setelah2">
                                                Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="{{route('pengawas_checklist_apd')}}"> <button type="button" class="btn btn-danger float-right">Kembali</button></a>
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

