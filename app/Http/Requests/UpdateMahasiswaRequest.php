<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        $mahasiswaId = $this->route('mahasiswa')?->id;

        return [
            'nim' => ['required','string','max:20', Rule::unique('mahasiswas','nim')->ignore($mahasiswaId)],
            'nama' => ['required','string','max:120'],
            'email' => ['required','email','max:150', Rule::unique('mahasiswas','email')->ignore($mahasiswaId)],
            'prodi_id' => ['required','exists:prodis,id'],
            'dosen_id' => ['required','exists:dosens,id'],
            'angkatan' => ['required','integer','min:2000','max:2100'],
            'tanggal_lahir' => ['nullable','date'],
            'alamat' => ['nullable','string','max:255'],
        ];
    }
}
