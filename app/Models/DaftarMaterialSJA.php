<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMaterialSJA extends Model
{
    use HasFactory;

    protected $table = "daftar_material_sja";

    protected $fillable = [
        "id_material",
        "jumlah_diminta",
        "jumlah_diberi",
        "tgl_keluar",
        "id_sja"
    ];

    public $timestamps = false;
}
