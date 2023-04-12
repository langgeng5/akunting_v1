<?php

namespace App\Http\Requests\kas_keluar;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKasKeluarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'no_bkk' => [
                'required',
                Rule::unique('kas_keluar')->ignore($this->id, 'no_bkk')
            ],
            'tgl_bkk' => [
                'required'
            ],
            'dibayar_kepada' => [
                'required',
            ],
            'untuk_pembayaran' => [
                'required',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'no_bkk.required' => 'No BKK Harus Diisi.',
            'no_bkk.unique' => 'No BKMK Telah Digunakan.',
            'tgl_bkk.required' => 'Tanggal BKK Harus Diisi.',
            'dibayar_kepada.required' => 'Dibayar Kepada Harus Diisi.',
            'untuk_pembayaran.required' => 'Untuk Pembayaran Harus Diisi.'
        ];
    }
}
