<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
                Rule::unique('user')->ignore($this->id, 'id_user')
            ],
            'password' => [],
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
            'password.required' => 'Passworn Harus Diisi.',
            'nama_pengguna.required' => 'Nama Pengguna Harus Diisi.',
            'tgl_lahir.required' => 'Tanggal Lahir Harus Diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi.',
            'level.required' => 'Jabatan Harus Diisi.',
        ];
    }
}
