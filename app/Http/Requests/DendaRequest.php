<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nominal' => ['required', 'numeric', 'min:0'],
        ];
    }
}
