<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
