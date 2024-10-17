<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialBekas extends Model
{
    use HasFactory;

    protected $table = "material_bekas";

    protected $fillable = [
        "normalisasi",
        "nama",
        "deskripsi",
        "satuan",
        "bagian",
        "jumlah_sap"
    ];
    
    protected $primaryKey = "id";

    public $timestamps = false;
}
