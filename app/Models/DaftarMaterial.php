<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMaterial extends Model
{
    use HasFactory;

    protected $table = "daftar_material";

    protected $fillable = [
        "id_dpb_suratjalan",
        "id_material",
        "jumlah_diminta",
        "jumlah_diberi",
        "tgl_keluar"
    ];
    protected $primaryKey = "id_daftar_material";
    
    public $timestamps = false;
}
