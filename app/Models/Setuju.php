<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setuju extends Model
{
    use HasFactory;

    protected $table = "setuju";
    
    protected $fillable = [
        'nama'
    ];
    protected $primaryKey = 'id_setuju';
    
    public $timestamps = false;
}
