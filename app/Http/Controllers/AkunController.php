<?php

namespace App\Http\Controllers;

use App\Http\Requests\akun\StoreAkunRequest;
use App\Http\Requests\akun\UpdateAkunRequest;
use App\Models\Akun;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AkunController extends Controller
{
    public function index(): View
    {
        $data_akun = Akun::all();
        return view('akun.index', ['data_akun' => $data_akun]);
    }

    public function show(string $id): View
    {
        $post = Akun::findOrFail($id);

        return view('main_layout');
    }

    public function create(): View
    {
        return view('akun.form');
    }

    public function store(StoreAkunRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $akun = Akun::create($validatedData);

        return redirect('/akun')->with('success', 'Tambah Data Akun "' . $request->input('nama_akun') . '" Berhasil');
    }

    public function edit(string $id): View
    {
        $akun = Akun::findOrFail($id);

        return view('akun.form', ['akun' => $akun]);
    }

    public function update(UpdateAkunRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        $akun = Akun::findOrFail($id);

        $akun->update($validatedData);

        return redirect('/akun')->with('success', 'Ubah Data Akun "' . $request->input('nama_akun') . '" Berhasil');
    }

    public function delete(string $id): RedirectResponse
    {
        $akun = Akun::findOrFail($id);

        $akun->delete();

        return redirect('/akun')->with('success', 'Hapus Data Akun "' . $akun->nama_akun . '" Berhasil');
    }
}
