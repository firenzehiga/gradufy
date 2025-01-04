<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        // Validasi untuk tabel dosen jika user adalah dosen
        if ($this->user()->role === 'dosen') {
            $rules = [
                'email' => [
                    'nullable',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('dosen', 'email')->ignore($this->user()->dosen->id),
                ],
                'telepon' => ['nullable', 'string', 'max:15'],
                'alamat' => ['nullable', 'string', 'max:255'],
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh dosen lain.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
        ];
    }
}
