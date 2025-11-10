<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'judul' => ['required', 'string', 'max:255'],
            'pengarang' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer'],
            'isbn' => ['required', 'string', 'max:255'],
            'tgl_input' => ['required', 'date'],
            'jml_halaman' => ['required', 'integer', 'min:1'],
            'id_kategori' => ['required', 'exists:kategori_buku,id_kategori'],
        ];
    }
}
