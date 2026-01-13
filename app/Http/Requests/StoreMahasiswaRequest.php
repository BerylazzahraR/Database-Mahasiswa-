<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nim' => ['required','string','max:20','unique:mahasiswas,nim'],
            'nama' => ['required','string','max:120'],
            'email' => ['required','email','max:150','unique:mahasiswas,email'],
            'prodi_id' => ['required','exists:prodis,id'],
            'dosen_id' => ['required','exists:dosens,id'],
            'angkatan' => ['required','integer','min:2000','max:2100'],
            'tanggal_lahir' => ['nullable','date'],
            'alamat' => ['nullable','string','max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'prodi_id.required' => 'Prodi wajib dipilih.',
            'dosen_id.required' => 'Dosen PA wajib dipilih.',
        ];
    }
}
