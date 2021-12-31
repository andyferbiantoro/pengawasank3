<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistApd extends Model
{
    protected $table = "checklist_apd";
    protected $fillable = [
        'nama_personel','id_apd','hasil_sebelum','hasil_saat','hasil_setelah','id_pekerjaan'
    ];
}
