<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpm extends Model
{
    use HasFactory;

    protected $table = "daftar_permintaan_material";

    protected $fillable = [
        'nomor_dpb',
        'id_dpb_suratjalan',
        'tgl_diminta',
        'setuju',
        'pemeriksa'
    ];
    protected $primaryKey = 'id_dpb';

    public $timestamps = false;

    public function dpmSuratJalan ()
    {
        return $this->belongsTo(DpmSuratJalan::class);
    }
}
