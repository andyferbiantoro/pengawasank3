<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPengawasan extends Model
{
   protected $table = "jadwal_pengawasan";
   protected $fillable = [
    'no_surat_tugas','tgl_surat_tugas','pekerjaan','no_pk','lokasi','titik_tumpu','koordinat','penyulang','pelaksana','petugas','arsip_surat_tugas','id_user','level'
 ];
}
