<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevelopmentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thumbnail' => 'required|image',
            'name' => 'required|string',
            'description' => 'required|string',
            'person_in_charge' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|integer',
            'status' => 'required|in:ongoing,completed',
        ];
    }

    public function attributes()
    {
      return [
        'thumbnail' => 'Thumbnail',
        'name' => 'Nama',
        'description' => 'Deskripsi',
        'person_in_charge' => 'Penanggung Jawab',
        'start_date' => 'Tanggal Mulai',
        'end_date' => 'Tanggal Selesai',
        'amount' => 'Jumlah Dana',
        'status' => 'Status',
      ];
    }
}
