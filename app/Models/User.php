<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = "user";

    protected $fillable = [
        'nama',
        'username',
        'password',
        'id_jenis_user'
    ];

    protected $primaryKey = 'id_user';

    public $timestamps = false;

    public function jenisUser() {

        return $this->belongsTo(JenisUser::class, 'id_jenis_user');
    }
}
