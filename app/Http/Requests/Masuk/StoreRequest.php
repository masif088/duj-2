<?php

namespace App\Http\Requests\Masuk;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'suplier.*' => 'required| integer',
            'barang.*' => 'required| integer',
            'gudang.*' => 'required| integer',
            'harga.*' => 'required| integer',
            'kuantiti.*' => 'required| integer',
            'kode_akuntan.*' => 'required| string',
        ];
    }
}
