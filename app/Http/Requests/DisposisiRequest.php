<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisposisiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surat_masuk_id' => 'required|exists:surat_masuk,id',
            'tujuan_disposisi' => 'required|string|max:255',
            'isi_disposisi' => 'required|string',
            'tanggal_disposisi' => 'required|date',
            'status' => 'required|in:Belum Diproses,Diproses,Selesai',
        ];
    }

    public function messages(): array
    {
        return [
            'surat_masuk_id.required' => 'Surat masuk wajib dipilih.',
            'surat_masuk_id.exists' => 'Surat masuk tidak ditemukan.',
            'tujuan_disposisi.required' => 'Tujuan disposisi wajib diisi.',
            'isi_disposisi.required' => 'Isi disposisi wajib diisi.',
            'tanggal_disposisi.required' => 'Tanggal disposisi wajib diisi.',
            'status.required' => 'Status wajib dipilih.',
        ];
    }


}
