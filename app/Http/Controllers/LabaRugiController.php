<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnal;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabaRugiController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->bulan) && isset($request->tahun)) {
            $data_akun = Akun::withSum([
                'jurnal as debet_rupiah' => function (Builder $query) use ($request) {
                    $query->whereYear('tgl_transaksi', $request->tahun)->whereMonth('tgl_transaksi', $request->bulan);
                }
            ], 'debet_rupiah')->withSum([
                'jurnal as kredit_rupiah' => function (Builder $query) use ($request) {
                    $query->whereYear('tgl_transaksi', $request->tahun)->whereMonth('tgl_transaksi', $request->bulan);
                }
            ], 'kredit_rupiah')->where('kategori_akun', 'Laba-rugi')->get();
        } else {
            $data_akun = [];
        }
        $tahun_jurnal = Jurnal::select(DB::raw('YEAR(tgl_transaksi) as year'))->distinct()->get();
        return view('laba_rugi.index', ['data_akun' => $data_akun, 'tahun' => $tahun_jurnal]);
    }
}
