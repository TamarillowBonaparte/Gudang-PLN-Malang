<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulp extends Model
{
    use HasFactory;

    protected $table = "ulp";

    protected $fillable = [
        "nama",
        "alamat"
    ];
    protected $primaryKey = "id_ulp";
    
    public $timestamps = false;
}
