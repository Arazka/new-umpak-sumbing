<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RPKPRequest extends FormRequest
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
            'foto' => 'file|max:5120',
            'deskripsi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian : attribute harus diisi / tidak boleh kosong!',
            'foto.max' => 'Ukuran foto harus lebih kecil dari 5 MB', 
        ];
    }
}
