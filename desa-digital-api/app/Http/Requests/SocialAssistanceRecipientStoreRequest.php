<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceRecipientStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'social_assistance_id' => 'required|exists:social_assistances,id',
            'head_of_family_id' => 'required|exists:head_of_families,id',
            'amount' => 'required|integer|min:0',
            'reason' => 'required|string',
            'banks' => 'required|string|in:bri,bni,bca,mandiri',
            'account_number' => 'required',
            'proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // max 2MB
            'status' => 'nullable|in:pending,approved,rejected'
        ];
    }

    public function attributes()
    {
        return [
            'social_assistance_id' => 'Bantuan Sosial',
            'head_of_family_id' => 'Kepala Keluarga',
            'amount' => 'Nominal',
            'reason' => 'Alasan',
            'banks' => 'Bank',
            'account_number'=> 'Nomor Rekening',
            'proof' => 'Bukti Penerimaan', // max 2MB
            'status' => 'Status Pengajuan'
        ];
    }
}
