<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validaPatrimonio extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = $this->id ?? ''; // PEGA O ID QUE ESTÁ SENDO EDITADO

        $rules = [
            'descricao' => 'required|string|max:100|min:2', 
            'num_patrimonio' => ['required', 'min:2']
        ];
        
        return $rules;

    }
}
