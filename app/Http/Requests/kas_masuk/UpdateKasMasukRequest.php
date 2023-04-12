<?php

namespace App\Http\Requests\kas_masuk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKasMasukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'no_bkm' => [
                'required',
                Rule::unique('kas_masuk')->ignore($this->id, 'no_bkm')
            ],
            'tgl_bkm' => [
                'required'
            ],
            'diterima_dari' => [
                'required',
            ],
            'untuk_penerimaan' => [
                'required',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'no_bkm.required' => 'No BKM Harus Diisi.',
            'no_bkm.unique' => 'No BKM Telah Digunakan.',
            'tgl_bkm.required' => 'Tanggal BKM Harus Diisi.',
            'diterima_dari.required' => 'Diterima Dari Harus Diisi.',
            'untuk_penerimaan.required' => 'Untuk Penerimaan Harus Diisi.'
        ];
    }
}
