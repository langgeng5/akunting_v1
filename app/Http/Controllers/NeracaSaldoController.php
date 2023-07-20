<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnal;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NeracaSaldoController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->bulan) && isset($request->tahun)) {
            $date = strtotime($request->tahun . '-' . $request->bulan . '-01');
            $dateFormated = date('Y-m-t', $date);
            $data_akun = Akun::withSum([
                'jurnal as debet_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'debet_rupiah')->withSum([
                'jurnal as kredit_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'kredit_rupiah')->where('kategori_akun', 'Neraca')->get();
        } else {
            $data_akun = [];
        }
        $tahun_jurnal = Jurnal::select(DB::raw('YEAR(tgl_transaksi) as year'))->distinct()->get();
        return view('neraca_saldo.index', ['data_akun' => $data_akun, 'tahun' => $tahun_jurnal]);
    }
}
