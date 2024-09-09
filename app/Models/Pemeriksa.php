<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksa extends Model
{
    use HasFactory;

    protected $table = "pemeriksa";
    
    protected $fillable = [
        'nama',
        'id_user'
    ];
    protected $primaryKey = 'id_pemeriksa';
    
    public $timestamps = false;
}
