<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengawasanK3 extends Model
{
    protected $table = "pengawasan_k3";
    protected $fillable = [
        'area','daerah_padam','titik_lampu_gardu','pengawas_k3','pengawas_vendor','jml_petugas','sop','ibpr','jsa','working_permit','arahan_pekerja','pengecekan_komunikasi','dok_brief','dok_pelaksanaan','unsafe_action','unsafe_kondisi','id_pekerjaan','id_checklist_apd','id_checklist_peralatan'
    ];
}
