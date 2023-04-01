<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'unique:user'
            ],
            'password' => [
                'required',
                'confirmed'
            ],
            'nama_pengguna' => [
                'required',
            ],
            'tgl_lahir' => [
                'required',
            ],
            'alamat' => [],
            'kontak' => [],
            'jenis_kelamin' => [
                'required',
            ],
            'level' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username Harus Diisi.',
            'username.unique' => 'Username Telah Digunakan.',
            'password.required' => 'Password Harus Diisi.',
            'password.confirmed' => 'Konfirmasi Password Salah.',
            'nama_pengguna.required' => 'Nama Pengguna Harus Diisi.',
            'tgl_lahir.required' => 'Tanggal Lahir Harus Diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi.',
            'level.required' => 'Jabatan Harus Diisi.',
        ];
    }
}
