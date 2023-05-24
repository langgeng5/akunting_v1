<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
        return view('laba_rugi.index', ['data_akun' => $data_akun]);
    }
}
