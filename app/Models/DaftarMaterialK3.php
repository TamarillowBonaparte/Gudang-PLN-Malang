<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMaterialK3 extends Model
{
    use HasFactory;

    protected $table = "dftrmaterial_k3";

    protected $fillable = [
        "nama",
        "normalisasi",
        "jumlah",
        "satuan",
        "id_k3"
    ];
    
    public $timestamps = false;
}
