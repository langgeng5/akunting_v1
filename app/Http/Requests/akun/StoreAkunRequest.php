<?php

namespace App\Http\Requests\akun;

use Illuminate\Foundation\Http\FormRequest;

class StoreAkunRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_reff' => [
                'required',
                'unique:akun'
            ],
            'kategori_akun' => [
                'required'
            ],
            'jenis_akun' => [
                'required'
            ],
            'nama_akun' => [
                'required',
                'unique:akun'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'kode_reff.required' => 'Kode Reff Harus Diisi.',
            'kode_reff.unique' => 'Kode Reff Telah Digunakan.',
            'kategori_akun.required' => 'Kategori Akun Harus Diisi.',
            'jenis_akun.required' => 'Jenis Akun Harus Diisi.',
            'nama_akun.required' => 'Nama Akun Harus Diisi.',
            'nama_akun.unique' => 'Nama Akun Telah Digunakan.'
        ];
    }
}
