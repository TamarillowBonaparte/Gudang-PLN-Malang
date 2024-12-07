<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalanAdmin extends Model
{
    use HasFactory;

    protected $table = "surat_jalan_admin";

    protected $fillable = [
        "kepada",
        "alamat",
        "no_permintaan",
        "penerima",
        "yang_menyerahkan",
        "keterangan",
        "id_suratjalan",
    ];

    public $timestamps = false;
}
