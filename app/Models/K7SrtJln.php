<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class K7SrtJln extends Model
{
    use HasFactory;
    protected $table = "k7_srtj";

    protected $fillable = [
        'id_suratjalan',
        'kpl_gudang',
        'penerima',
        'no_spk',
        'id_jns_pekerjaan',
        'idpel',
        'nm_pelanggan',
        'almt_pelanggan',
        'id_ulp',
        'id_pb_pd',
        'trdy_lama',
        'trdy_baru',
        'id_user'
    ];

    public $timestamps = false;

    public function dpm()
    {
        return $this->hasMany(Dpm::class);
    }
}
