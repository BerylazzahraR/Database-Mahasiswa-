<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
{
    public function authorize(): bool { return true; }

   public function rules(): array
{
    return [
        'nidn' => ['required','string','max:20','unique:dosens,nidn'],
        'nama' => ['required','string','max:120'],
        'email' => ['nullable','email','max:150','unique:dosens,email'],
        'prodi_id' => ['nullable','exists:prodis,id'],
    ];
}

}
