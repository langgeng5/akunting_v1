<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnal;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuBesarController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->bulan) && isset($request->tahun)) {
            $data_akun = Akun::with(['jurnal' => function (Builder $query) use ($request) {
                $query->whereYear('tgl_transaksi', $request->tahun)->whereMonth('tgl_transaksi', $request->bulan);
            }])->get();
        } else {
            $data_akun = [];
        }
        $tahun_jurnal = Jurnal::select(DB::raw('YEAR(tgl_transaksi) as year'))->distinct()->get();
        return view('buku_besar.index', ['data_akun' => $data_akun, 'tahun' => $tahun_jurnal]);
    }
}
