<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // 1. لازم تستدعي الكلاس ده

class UpdateCoachRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // 2. خليها true
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',

            'phone' => [
                'nullable', 
                'string', 
                Rule::unique('coaches', 'phone')->ignore($this->coach)
            ],

            'image' => 'nullable|image',

            'games' => 'sometimes|nullable|array',
            'games.*' => 'exists:games,id',
        ];
    }
}