<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            
            // الصورة اختيارية، بس لو جت لازم تكون ملف صورة
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // اللينكات لازم تكون array
            'links' => 'nullable|array',
        ];
    }
}