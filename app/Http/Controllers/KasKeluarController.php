<?php

namespace App\Http\Controllers;

use App\Http\Requests\kas_keluar\StoreKasKeluarRequest;
use App\Http\Requests\kas_keluar\UpdateKasKeluarRequest;
use App\Models\Akun;
use App\Models\KasKeluar;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KasKeluarController extends Controller
{
    public function index(): View
    {
        $data_kas_keluar = KasKeluar::all();
        return view('kas_keluar.index', ['data_kas_keluar' => $data_kas_keluar]);
    }

    public function create(): View
    {
        $akun = Akun::all();
        return view('kas_keluar.form', ['akun' => $akun]);
    }

    public function store(StoreKasKeluarRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $totalKredit = 0;
        $jurnals = [];
        foreach ($request->input('no_rekening') as $key => $value) {
            $totalKredit = $totalKredit + $request->input('kredit')[$key];

            $jurnal = array(
                'no_transaksi' => 'bkk' . $request->input('no_bkk'),
                'tgl_transaksi' => $request->input('tgl_bkk'),
                'no_rekening' => $request->input('no_rekening')[$key],
                'debet_rupiah' => $request->input('debet')[$key],
                'kredit_rupiah' => $request->input('kredit')[$key],
            );

            array_push($jurnals, $jurnal);
        }

        $validatedData['uang_berjumlah'] = $totalKredit;

        $kas_keluar = KasKeluar::create($validatedData);
        $kas_keluar->jurnal()->createMany($jurnals);

        return redirect('/kas-keluar')->with('success', 'Tambah Data Kas Keluar "' . $request->input('no_bkk') . '" Berhasil');
    }

    public function edit(string $id): View
    {
        $akun = Akun::all();
        $kas_keluar = KasKeluar::findOrFail($id);

        return view('kas_keluar.form', ['akun' => $akun, 'kas_keluar' => $kas_keluar]);
    }

    public function update(UpdateKasKeluarRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $totalKredit = 0;
        $jurnals = [];
        foreach ($request->input('no_rekening') as $key => $value) {
            $totalKredit = $totalKredit + $request->input('kredit')[$key];

            $jurnal = array(
                'no_transaksi' => 'bkk' . $request->input('no_bkk'),
                'tgl_transaksi' => $request->input('tgl_bkk'),
                'no_rekening' => $request->input('no_rekening')[$key],
                'debet_rupiah' => $request->input('debet')[$key],
                'kredit_rupiah' => $request->input('kredit')[$key],
            );

            array_push($jurnals, $jurnal);
        }

        $validatedData['uang_berjumlah'] = $totalKredit;

        $kas_keluar = KasKeluar::findOrFail($id);

        $kas_keluar->update($validatedData);
        $kas_keluar->jurnal()->delete();
        $kas_keluar->jurnal()->createMany($jurnals);

        return redirect('/kas-keluar')->with('success', 'Ubah Data Kas Keluar "' . $request->input('no_bkk') . '" Berhasil');
    }

    public function delete(string $id): RedirectResponse
    {
        $kas_keluar = KasKeluar::findOrFail($id);
        $kas_keluar->jurnal()->delete();
        $kas_keluar->delete();

        return redirect('/kas-keluar')->with('success', 'Hapus Data Kas Keluar "' . $kas_keluar->no_bkk . '" Berhasil');
    }
}
