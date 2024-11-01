<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPage extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda, tentukan di sini
    protected $table = 'daftar_permintaan_material';  // Nama tabel di database

    // Tentukan jika primary key berbeda dari 'id'
    protected $primaryKey = 'id_dpb';  // Misal, jika primary key adalah 'id_surat'

    public $timestamps = false; 
}

