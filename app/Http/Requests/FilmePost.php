<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmePost extends FormRequest
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
            'titulo' =>              'required',
            'genero_code' =>         'required|exists:generos,code',
            'ano' =>                'required|integer|between:1900,2050',
            'sumario' =>            'required',
            'trailer_url' =>         'nullable',
            'cartaz_url' =>          'nullable|image|max:8192', 
        ];
    }
}
