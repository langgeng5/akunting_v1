<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    public function index(Request $request)
    {
        $aktiva = ['Aktiva'];
        $pasiva = ['Hutang', 'Ekuitas'];

        if (isset($request->bulan) && isset($request->tahun)) {
            $date = strtotime($request->tahun . '-' . $request->bulan . '-01');
            $dateFormated = date('Y-m-t', $date);

            $data_akun['aktiva'] = Akun::withSum([
                'jurnal as debet_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'debet_rupiah')->withSum([
                'jurnal as kredit_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'kredit_rupiah')->where('kategori_akun', 'Neraca')->whereIn('jenis_akun', $aktiva)->get();

            $data_akun['pasiva'] = Akun::withSum([
                'jurnal as debet_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'debet_rupiah')->withSum([
                'jurnal as kredit_rupiah' => function (Builder $query) use ($dateFormated) {
                    $query->where('tgl_transaksi', '<=', $dateFormated);
                }
            ], 'kredit_rupiah')->where('kategori_akun', 'Neraca')->whereIn('jenis_akun', $pasiva)->get();
        } else {
            $data_akun['aktiva'] = [];
            $data_akun['pasiva'] = [];
        }

        return view('neraca.index', ['data_akun' => $data_akun]);
    }
}
