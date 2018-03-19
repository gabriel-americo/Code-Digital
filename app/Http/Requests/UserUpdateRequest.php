<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'cpf' => 'required', 
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'sometimes'
        ];
    }
    
    public function messages() {
        // mensagens de erro personalizadas!
        return [
            'cpf.required' => 'O campo :attribute é obrigatório',
            'nome.required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo :attribute tem que ter mais do que 3 caracteres',
            'email.required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O campo :attribute tem que ser um email',
            'email.unique:users' => 'O campo :attribute já existe',
        ];
    }
}
