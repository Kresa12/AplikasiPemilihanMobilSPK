<?php

namespace App\Http\Requests;

use App\Models\Kriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Import Rule

class UpdateKriteriaRequest extends FormRequest
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
        // Ambil kriteria yang sedang diedit dari route
        $kriterium = $this->route('kriterium'); 

        return [
            // Rule 'unique' di sini harus mengabaikan ID dari kriteria yang sedang diedit
            'kode_kriteria' => ['required', 'max:10', Rule::unique('kriterias')->ignore($kriterium->id)],
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => [
                'required',
                'numeric',
                'min:0',
                // Custom rule untuk update
                function ($attribute, $value, $fail) use ($kriterium) {
                    // Hitung total bobot dari kriteria lain (kecualikan yang sedang diedit)
                    $totalBobotLain = Kriteria::where('id', '!=', $kriterium->id)->sum('bobot');
                    if (($totalBobotLain + $value) > 1) {
                        $sisaBobot = 1 - $totalBobotLain;
                        $sisaBobotFormatted = rtrim(rtrim(number_format($sisaBobot, 4), '0'), '.');
                        $fail("Total bobot semua kriteria tidak boleh melebihi 1. Sisa bobot yang tersedia adalah {$sisaBobotFormatted}.");
                    }
                },
            ],
            'tipe' => 'required|in:benefit,cost',
        ];
    }

    // Anda juga bisa menambahkan method messages() di sini jika perlu pesan custom untuk update
}