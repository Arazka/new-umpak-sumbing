<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            'foto' => 'required|file|max:5120',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian :attribute tidak memenuhi',
        ];
    }
}
