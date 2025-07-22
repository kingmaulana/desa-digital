<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
  public function rules(): array
    {
        return [
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'about' => 'nullable|string|max:1000',
            'headman' => 'required|string|max:255',
            'people' => 'required|integer|min:0',
            'agriculture_area' => 'required|numeric|min:0',
            'total_area' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function attributes()
    {
      return [
        'thumbnail' => 'Thumbnail',
        'name' => 'Nama',
        'about' => 'Tentang',
        'headman' => 'Kepala Desa',
        'people' => 'Jumlah Penduduk',
        'agriculture_area' => 'Luas Lahan Pertanian',
        'total_area' => 'Luas Total Wilayah',
        'images' => 'Gambar',
      ];
    }
}
