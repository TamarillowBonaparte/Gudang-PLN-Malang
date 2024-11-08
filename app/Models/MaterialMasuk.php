<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialMasuk extends Model
{
    use HasFactory;

    protected $table = "material_masuk";

    protected $fillable = [
        "tgl",
        "jumlah",
        "id_material"
    ];
    
    public $timestamps = false;
}
