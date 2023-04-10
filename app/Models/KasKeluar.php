<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    protected $table = 'kas_keluar';
    protected $primaryKey = 'no_bkk';

    protected $fillable = [
        'no_bkk',
        'tgl_bkk',
        'dibayar_kepada',
        'uang_berjumlah',
        'untuk_pembayaran',
    ];

    protected $hidden = [];

    public function jurnal()
    {
        return $this->hasMany('App\Jurnal', 'no_transaksi', 'no_bkk');
    }
}
