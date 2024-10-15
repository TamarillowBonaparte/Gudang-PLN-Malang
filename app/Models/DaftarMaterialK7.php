<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMaterialK7 extends Model
{
    use HasFactory;

    protected $table = "dftrmaterial_k7";

    protected $fillable = [
        "id_mtrl_k7",
        "jumlah",
        "id_k7srtjln",
        "tgl_keluar",

    ];
    protected $primaryKey = "id";

    public $timestamps = false;

}
