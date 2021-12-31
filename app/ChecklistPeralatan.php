<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistPeralatan extends Model
{
    protected $table = "checklist_peralatan";
    protected $fillable = [
        'id_peralatan','jumlah','sat','hasil_sebelum','hasil_setelah','keterangan','dok_pemasangan','id_pekerjaan'
    ];
}
