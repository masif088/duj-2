<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class UpdateRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($this->route('id'))],
            'password' => 'nullable|string|min:1',
            'img' => 'nullable|image|max:2042',
            'alamat' => 'nullable|string|min:5',
            'no_hp' => 'nullable|string|min:11',
            'role' => 'nullable|string',
            'sidik' => 'nullable|string',
        ];
    }
    public $validator = null;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
