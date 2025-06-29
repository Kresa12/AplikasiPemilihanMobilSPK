<?php

namespace App\Http\Requests;

use App\Models\Kriteria; // Import model Kriteria
use Illuminate\Foundation\Http\FormRequest;

class StoreKriteriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Set ke true agar semua pengguna yang sudah login bisa membuat request ini
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
            'kode_kriteria' => 'required|unique:kriterias|max:10',
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => [
                'required',
                'numeric',
                'min:0',
                // Custom validation rule untuk memastikan total bobot tidak lebih dari 1
                function ($attribute, $value, $fail) {
                    $totalBobotLain = Kriteria::sum('bobot');
                    if (($totalBobotLain + $value) > 1) {
                        $sisaBobot = 1 - $totalBobotLain;
                        // Format sisa bobot agar lebih mudah dibaca
                        $sisaBobotFormatted = rtrim(rtrim(number_format($sisaBobot, 4), '0'), '.');
                        $fail("Total bobot semua kriteria tidak boleh melebihi 1. Sisa bobot yang tersedia adalah {$sisaBobotFormatted}.");
                    }
                },
            ],
            'tipe' => 'required|in:benefit,cost',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'kode_kriteria.required' => 'Kode kriteria wajib diisi.',
            'kode_kriteria.unique' => 'Kode kriteria sudah digunakan, silakan gunakan kode lain.',
            'nama_kriteria.required' => 'Nama kriteria wajib diisi.',
            'bobot.required' => 'Bobot wajib diisi.',
            'bobot.numeric' => 'Bobot harus berupa angka.',
            'tipe.required' => 'Tipe kriteria wajib dipilih.',
        ];
    }
}