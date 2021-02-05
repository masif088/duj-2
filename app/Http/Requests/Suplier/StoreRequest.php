<?php

namespace App\Http\Requests\Suplier;

use Illuminate\Contracts\Validation\Validator;
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
            'name' => 'required| string|max:50',
            'no_hp' => 'required| string|max:50',
            'alamat' =>'required| string|min:4',
        ];
    }
    public $validator = null;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
