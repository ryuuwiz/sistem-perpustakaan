<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
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
            'tgl_pinjam'  => ['required', 'date'],
            'lama_pinjam' => ['required', 'integer', 'min:1'],
            'id_anggota'  => ['required', 'exists:anggota,id_anggota'],
            'id_denda'    => ['nullable', 'exists:denda,id_denda'],
            'buku_ids'    => ['required', 'array', 'min:1'],
            'buku_ids.*'  => ['exists:buku,id_buku'],
        ];
    }
}
