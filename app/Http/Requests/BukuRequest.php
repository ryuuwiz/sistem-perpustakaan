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
			'id_buku' => 'required',
			'judul' => 'required|string',
			'pengarang' => 'required|string',
			'penerbit' => 'required|string',
			'tahun' => 'required',
			'isbn' => 'required|string',
			'tgl_input' => 'required',
			'jml_halaman' => 'required',
			'id_kategori' => 'required',
        ];
    }
}
