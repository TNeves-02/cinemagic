<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioPost extends FormRequest
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
            'name' =>         'required',
            'email' =>         'required|unique:users',
            'password' =>      [
                'required',
                'string',
                'min:8',
             ] ,
            'tipo' =>           'required',
            'bloqueado' =>      'required',
            'foto_url' =>       'nullable|image|max:8192' 
        ];
    }
}

