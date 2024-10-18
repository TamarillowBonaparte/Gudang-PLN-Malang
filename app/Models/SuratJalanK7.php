<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalanK7 extends Model
{
    use HasFactory;

    protected $table = "k7_srtjln";

    protected $fillable = [
        "id_srtjln ",
        "kpl_gudang",
        "penerima",
        "nospk",
        "id_jns_pekerjaan ",
        "idpel",
        "nm_pelanggan",
        "almt_pelanggan",
        "id_ulp",
        "id_pbpd",
        "trfdy_lama",
        "trfdy_baru",
        "id_user "
    ];
    protected $primaryKey = "id";

    public $timestamps = false;
}
