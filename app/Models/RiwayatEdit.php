<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatEdit extends Model
{
    use HasFactory;

    protected $table = "riwayat_edit";
    
    protected $fillable = [
        'id_suratjalan',
        'id_material',
        'jumlah_sebelumnya',
        'jumlah_ditambah',
        'tgl_diubah',
    ];
    
    public $timestamps = false;
}
