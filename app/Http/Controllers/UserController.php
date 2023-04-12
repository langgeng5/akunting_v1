<?php

namespace App\Http\Controllers;

// use App\Http\Requests\user\StoreUserRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;


class UserController extends Controller
{
    public function index(): View
    {
        $data_user = User::all();
        return view('user.index', ['data_user' => $data_user]);
    }

    public function create(): View
    {
        return view('user.form');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return redirect('/user')->with('success', 'Tambah Data User "' . $request->input('nama_pengguna') . '" Berhasil');
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('user.form', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($validatedData['password'] == null) {
            $validatedData = Arr::except($validatedData, ['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user = User::findOrFail($id);

        $user->update($validatedData);

        return redirect('/user')->with('success', 'Ubah Data User "' . $request->input('nama_pengguna') . '" Berhasil');
    }

    public function delete(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/user')->with('success', 'Hapus Data User "' . $user->nama_pengguna . '" Berhasil');
    }
}
