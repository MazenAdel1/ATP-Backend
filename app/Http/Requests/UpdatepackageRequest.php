<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatepackageRequest extends FormRequest
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
            'game_id' => ['sometimes', 'integer', 'exists:games,id'],
            
            'name' => [
                'sometimes', 
                'string', 
                'max:255',
        
            ],
            'image'=>'nullable|image',
            'price' => ['sometimes', 'numeric', 'min:0'],
            'sessions_count' => ['sometimes', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'gender' => ['sometimes', Rule::in(['male', 'female', 'both'])],
        ];
    }
}
