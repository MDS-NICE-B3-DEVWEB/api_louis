<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest
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
            'titre' => 'required',
            
        ];
    }
        public function failedValidation(validator $validator)
        {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => true,
                'message' => 'Erreur de validation',
                'errorsList' => $validator->errors()->toArray(),
            ]));
        }
    
public function messages(){

    return [
       'titre.required' => 'Le titre est obligatoire',
    ];
}

}
