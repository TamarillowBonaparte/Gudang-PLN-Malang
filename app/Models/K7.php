<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class K7 extends model{

    use HasFactory;

    protected $table = "k7";

    protected $fillable = [
        'nmr_k7',
        'id_k7srtjln',
        'tgl_diminta',
        'setuju',
        'pemeriksa',
        'id_gdngpemberi',
        'merk_material',
        'noseri_material',
        'keterangan',
        'id_jnssurat',
    ];

    public $timestamps = false;

    public function dpmSuratJalan ()
    {
        return $this->belongsTo(DpmSuratJalan::class);
    }
}

