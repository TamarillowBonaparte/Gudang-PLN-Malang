<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilPenerima extends Model
{
    use HasFactory;

    protected $table = "pengambil_penerima";
    
    protected $fillable = [
        'nama',
        'id_user'
    ];
    
    public $timestamps = false;
}
