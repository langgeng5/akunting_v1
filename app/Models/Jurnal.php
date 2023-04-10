<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';
    protected $primaryKey = 'id_jurnal';

    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'no_rekening',
        'debet_rupiah',
        'kredit_rupiah',
    ];

    protected $hidden = [];
}
