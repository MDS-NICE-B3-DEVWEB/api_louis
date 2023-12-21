<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // on donne les regles de validation
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
    }
        public function failedValidation(validator $validator)
        {
            // on envoie une reponse json avec les erreurs
            throw new HttpResponseException(response()->json([
                'success' => false,
                'status_code' => 422, 
                'errors' => true,
                'message' => 'Erreur de validation',
                'errorsList' => $validator->errors()->toArray(),
            ]));
        }
    
public function messages(){

    return [
        // envoi un message d'erreur si les champs ne sont pas remplis
        'name.required' => 'un nom doit etre fourni',
        'email.required' => 'un email doit etre fourni',
        'email.unique' => 'cet email existe deja',
        'password.required' => 'un mot de passe doit etre fourni',
    ];
}
}
