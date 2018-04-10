<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortifoliosUpdateRequest extends FormRequest
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
            'nome' => 'required',
            'categoria_portifolio_id' => 'required'
        ];
    }
    
    public function messages()
    {
        // mensagens de erro personalizadas!
        return [
            'nome.required' => 'O campo :attribute é obrigatório',
            'categoria_portifolio_id.required' => 'O campo :attribute é obrigatório'
        ];
    }
}
