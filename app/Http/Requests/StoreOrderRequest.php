<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'menu_id'       => 'required|exists:menus,id',
            'quantity'      => 'required|integer|min:1',
            'event_date'    => 'required|date|after_or_equal:today',
            'event_address' => 'required|string|max:500',
            'notes'         => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'phone.required'         => 'Nomor WhatsApp wajib diisi.',
            'menu_id.required'       => 'Pilih paket menu terlebih dahulu.',
            'menu_id.exists'         => 'Paket menu tidak valid.',
            'quantity.required'      => 'Jumlah porsi wajib diisi.',
            'quantity.min'           => 'Minimal pemesanan 1 porsi.',
            'event_date.required'    => 'Tanggal acara wajib diisi.',
            'event_date.after_or_equal' => 'Tanggal acara harus hari ini atau setelahnya.',
            'event_address.required' => 'Alamat acara wajib diisi.',
        ];
    }
}
