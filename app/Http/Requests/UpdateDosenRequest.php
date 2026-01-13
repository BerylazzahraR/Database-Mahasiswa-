<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDosenRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
{
    $id = $this->route('dosen')?->id;

    return [
        'nidn' => ['required','string','max:20', \Illuminate\Validation\Rule::unique('dosens','nidn')->ignore($id)],
        'nama' => ['required','string','max:120'],
        'email' => ['nullable','email','max:150', \Illuminate\Validation\Rule::unique('dosens','email')->ignore($id)],
        'prodi_id' => ['nullable','exists:prodis,id'],
    ];
}

}
