<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('surat_keluar')?->id ?? 'NULL';

        return [
            'nomor_surat' => 'required|unique:surat_keluar,nomor_surat,'.$id,
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ];
    }
}
