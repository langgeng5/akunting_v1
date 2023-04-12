<?php

namespace App\Http\Controllers;

use App\Http\Requests\kas_masuk\StoreKasMasukRequest;
use App\Http\Requests\kas_masuk\UpdateKasMasukRequest;
use App\Models\Akun;
use App\Models\KasMasuk;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KasMasukController extends Controller
{
    public function index(): View
    {
        $data_kas_masuk = KasMasuk::all();
        return view('kas_masuk.index', ['data_kas_masuk' => $data_kas_masuk]);
    }

    public function create(): View
    {
        $akun = Akun::all();
        return view('kas_masuk.form', ['akun' => $akun]);
    }

    public function store(StoreKasMasukRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $totalDebet = 0;
        $jurnals = [];
        foreach ($request->input('no_rekening') as $key => $value) {
            $totalDebet = $totalDebet + $request->input('debet')[$key];

            $jurnal = array(
                'no_transaksi' => 'bkm' . $request->input('no_bkm'),
                'tgl_transaksi' => $request->input('tgl_bkm'),
                'no_rekening' => $request->input('no_rekening')[$key],
                'debet_rupiah' => $request->input('debet')[$key],
                'kredit_rupiah' => $request->input('kredit')[$key],
            );

            array_push($jurnals, $jurnal);
        }

        $validatedData['uang_sejumlah'] = $totalDebet;

        $kas_masuk = KasMasuk::create($validatedData);
        $kas_masuk->jurnal()->createMany($jurnals);

        return redirect('/kas-masuk')->with('success', 'Tambah Data Kas Masuk "' . $request->input('no_bkm') . '" Berhasil');
    }

    public function edit(string $id): View
    {
        $akun = Akun::all();
        $kas_masuk = KasMasuk::findOrFail($id);

        print_r($kas_masuk->jurnal);

        return view('kas_masuk.form', ['akun' => $akun, 'kas_masuk' => $kas_masuk]);
    }

    public function update(UpdateKasMasukRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $totalDebet = 0;
        $jurnals = [];
        foreach ($request->input('no_rekening') as $key => $value) {
            $totalDebet = $totalDebet + $request->input('debet')[$key];

            $jurnal = array(
                'no_transaksi' => 'bkm' . $request->input('no_bkm'),
                'tgl_transaksi' => $request->input('tgl_bkm'),
                'no_rekening' => $request->input('no_rekening')[$key],
                'debet_rupiah' => $request->input('debet')[$key],
                'kredit_rupiah' => $request->input('kredit')[$key],
            );

            array_push($jurnals, $jurnal);
        }

        $validatedData['uang_sejumlah'] = $totalDebet;

        $kas_masuk = KasMasuk::findOrFail($id);

        $kas_masuk->update($validatedData);
        $kas_masuk->jurnal()->delete();
        $kas_masuk->jurnal()->createMany($jurnals);

        return redirect('/kas-masuk')->with('success', 'Ubah Data Kas Masuk "' . $request->input('no_bkm') . '" Berhasil');
    }

    public function delete(string $id): RedirectResponse
    {
        $kas_masuk = KasMasuk::findOrFail($id);
        $kas_masuk->jurnal()->delete();
        $kas_masuk->delete();

        return redirect('/kas-masuk')->with('success', 'Hapus Data Kas Masuk "' . $kas_masuk->no_bkm . '" Berhasil');
    }
}
