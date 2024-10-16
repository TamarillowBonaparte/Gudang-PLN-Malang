<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $table = "jenis_user";

    protected $fillable= [
        'tipe'
    ];

    protected $primaryKey = 'id_jenis_user';

    public $timestamps = false;
}
