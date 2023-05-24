<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
        return view('buku_besar.index', ['data_akun' => $data_akun]);
    }
}
