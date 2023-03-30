<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'nama_pengguna',
        'password',
        'level',
    ];

    protected $hidden = [
        'password',
    ];
}
