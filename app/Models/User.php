<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'nama_pengguna',
        'alamat',
        'kontak',
        'tgl_lahir',
        'jenis_kelamin',
        'level',
    ];

    protected $hidden = [
        'password',
    ];
}
