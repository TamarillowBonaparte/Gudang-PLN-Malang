<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    protected $table = "surat_jalan";

    protected $fillable = [
        "nomor_suratjln",
        "tgl_diterima",
        "nomor_polisi",
        "pengemudi"
    ];
    protected $primaryKey = "id_surat_jalan";

    public $timestamps = false;
}
