<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;  
use Illuminate\Http\Exceptions\HttpResponseException;

class LogUserRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            
        ];
    }
        public function failedValidation(validator $validator)
        {
            // on envoie une reponse json avec les erreurs
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => true,
                'message' => 'Erreur de validation',
                'errorsList' => $validator->errors()->toArray(),
            ]));
        }
    
public function messages(){

    return [
        
        // envoi un message d'erreur si les champs ne sont pas remplis
        'email.required' => 'Pas d email',
        'email.email' => 'email invalide',
        'email.exists' => 'email inexistant',
        'password.required' => 'Pas de mdp',
        
    ];
}
}
