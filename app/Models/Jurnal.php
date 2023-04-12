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

    public function akun()
    {
        return $this->belongsTo('App\Models\Akun', 'no_rekening', 'id_akun');
    }
}
