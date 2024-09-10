<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpmSuratJalan extends Model
{
    use HasFactory;

    protected $table = "dpb_suratjalan";
    
    protected $fillable = [
        'kepala_gudang',
        'penerima',
        'no_spk',
        'id_jenis_pekerjaan',
        'idpel',
        'nama_pelanggan',
        'alamat_pelanggan',
        'id_ulp',
        'id_pb_pd',
        'tarif_daya_lama',
        'tarif_daya_baru',
        'id_user'
    ];
    protected $primaryKey = 'id_dpb_suratjalan';
    
    public $timestamps = false;

    public function dpm()
    {
        return $this->hasMany(Dpm::class);
    }
}
