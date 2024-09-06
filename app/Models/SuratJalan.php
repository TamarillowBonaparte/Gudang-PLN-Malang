<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    protected $table = "surat_jalan";

    protected $fillable = [
        "id_dpb_suratjalan",
        "tgl_diterima",
        "nomor_polisi",
        "pengemudi"
    ];
    protected $primaryKey = "id_surat_jalan";
    
    public $timestamps = false;
}
