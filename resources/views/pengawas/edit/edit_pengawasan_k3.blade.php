@extends('layouts.pengawas_master')

@section('title')
Edit Pengawasan K3
@endsection

@section('content')



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengawasan K3</h1>
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
                 @foreach($data_pengawasan_k3 as $data)
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
                                <input type="text" required class="form-control" id="area_update" name="area" placeholder="Area/Rayon" value="{{$data->area}}"><br>
                                <input type="text" required class="form-control" id="daerah_padam_update" name="daerah_padam" placeholder="Daerah Padam" value="{{$data->daerah_padam}}"><br>
                                <input type="text" required class="form-control" id="titik_lampu_gardu_update" name="titik_lampu_gardu" placeholder="Titik Tumpu Gardu" value="{{$data->titik_lampu_gardu}}">
                            </div>
                            <div class="form-group">
                                <label>Personel Terkait</label>
                                <input type="text" required class="form-control" id="pengawas_k3_update" name="pengawas_k3" placeholder="Pengawas Pekerjaan & K3 (PLN)" value="{{$data->pengawas_k3}}"><br>
                                <input type="text" required class="form-control" id="pengawas_vendor_update" name="pengawas_vendor" placeholder="Pengawas Pekerjaan & K3 (Vendor)" value="{{$data->pengawas_vendor}}"><br>
                                <input type="number" required class="form-control" id="jml_petugas_update" name="jml_petugas" placeholder="Jumlah Petugas Pelaksana" value="{{$data->jml_petugas}}">
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
                    <input type="text" required class="form-control" id="unsafe_action_update" name="unsafe_action" placeholder="Unsafe Action" value="{{$data->unsafe_action}}"><br>
                    <input type="text" required class="form-control" id="unsafe_kondisi_update" name="unsafe_kondisi" placeholder="Unsafe Condition" value="{{$data->unsafe_kondisi}}">
                </div>
                <a href="{{route('pengawas_pengawasan_k3')}}"> <button type="button" class="btn btn-danger float-right">Kembali</button></a>
                <button type="submit" class="btn btn-primary float-right mr-2">Perbarui</button>
            </div>
        </div>
    </form>
    @endforeach
</div>
</div>
</div>
</div>
</div>



@endsection('content')

