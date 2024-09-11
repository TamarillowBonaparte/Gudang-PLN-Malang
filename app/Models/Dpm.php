<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpm extends Model
{
    use HasFactory;

    protected $table = "daftar_permintaan_material";
    
    protected $fillable = [
        'id_dpb_suratjalan',
        'tgl_diminta',
        'id_setuju',
        'id_pemeriksa'
    ];
    protected $primaryKey = 'nomor_dpb';
    
    public $timestamps = false;
}
