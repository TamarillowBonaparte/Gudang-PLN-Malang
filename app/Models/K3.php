<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class K3 extends Model
{
    use HasFactory;

    protected $table = "k3";
    
    protected $fillable = [
        'nmr_k3',
        'tgl_diminta',
        'setuju',
        'pemeriksa',
        'kpl_gdng',
        'pengembali',
        'id_jnssurat',
        'nospk',
        'jnspekerjaan',
        'idpel',
        'nm_pelanggan',
        'almt_pelanggan',
        'nmr_seri',
        'nodpb_buktipotong',
        'id_kondisi',
        'id_gdngpengembalian',
        'lokasi_pengembalian',
        'keterangan',
        'id_user',
    ];
    
    public $timestamps = false;
}
