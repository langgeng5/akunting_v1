<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';

    protected $fillable = [
        'kode_reff',
        'kategori_akun',
        'nama_akun',
    ];

    protected $hidden = [];
}
