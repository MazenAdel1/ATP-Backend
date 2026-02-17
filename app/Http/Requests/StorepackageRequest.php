<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorepackageRequest extends FormRequest
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
            'game_id' => ['nullable', 'integer', 'exists:games,id'], // اتأكد ان جدول الألعاب اسمه games
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'sessions_count' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'], // عملتها nullable لو الوصف مش إجباري
            'gender' => ['required', Rule::in(['male', 'female', 'both'])],
            'image'=>'nullable|image'
        ];
    }
}
