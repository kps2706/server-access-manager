<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGlobalRuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'category' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'severity' => 'nullable|string|max:255',
            'impact_area' => 'nullable|string|max:255',
            'recommendation' => 'nullable|string',
            'reference_link' => 'nullable|url',
            'remarks' => 'nullable|string',
        ];
    }
}
