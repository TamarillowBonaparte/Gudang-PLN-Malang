<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model {

    use HasFactory;

    protected $table = "material";
    protected $fillable = ["normalisasi", "nama", "deskripsi", "satuan", "bagian", "sumlah_sap"];
    protected $primaryKey = "id_material";
    
    public $timestamps = false;
}
