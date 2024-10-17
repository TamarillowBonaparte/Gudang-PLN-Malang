<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembali extends Model
{
    use HasFactory;

    protected $table = "pengembali";
    
    protected $fillable = [
        'nama',
        'id_user'
    ];
    
    public $timestamps = false;
}
