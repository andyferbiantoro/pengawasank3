<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = "pekerjaan";
    protected $fillable = [
        'pekerjaan','plk_pekerjaan','no_pk','hari_tgl','wkt_pekerjaan_awal','wkt_pekerjaan_akhir'
    ];
}
