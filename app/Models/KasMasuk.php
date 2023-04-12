<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected $table = 'kas_masuk';
    protected $primaryKey = 'no_bkm';

    protected $fillable = [
        'no_bkm',
        'tgl_bkm',
        'diterima_dari',
        'uang_sejumlah',
        'untuk_penerimaan',
    ];

    protected $hidden = [];

    public function jurnal()
    {
        return $this->hasMany('App\Models\Jurnal', 'kas_masuk_id', 'no_bkm');
    }
}
