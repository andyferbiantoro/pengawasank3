<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    protected $table = "peralatan";
    protected $fillable = [
        'nama_peralatan'
    ];
}
