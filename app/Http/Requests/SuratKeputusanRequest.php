<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeputusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('surat_keputusan');

        return [
            'nomor_sk' => 'required|string|max:255|unique:surat_keputusan,nomor_sk' . $id,
            'nama_sk' =>'required|string|max:255',
            'tanggal' =>'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_sk' => 'nullable|mimes:pdf|max:5120'
        ];
    }

    public function messages():array {
        return [
            'nomor_sk.required' => 'Nomor SK wajib diisi.',
            'nomor_sk.unique' => 'Nomor SK sudah digunakan.',

            'nama_sk.required' => 'Nama SK wajib diisi.',

            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'perihal.required' => 'Perihal wajib diisi.',

            'file_sk.mimes' => 'File harus berupa PDF.',
            'file_sk.max' => 'Ukuran file maksimal 5 MB',
        ];
    }
}
