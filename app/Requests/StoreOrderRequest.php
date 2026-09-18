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
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'event_date' => ['required', 'date', 'after_or_equal:today'],
            'event_address' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            'menu_id' => ['required', 'exists:menus,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama wajib diisi.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'event_date.required' => 'Tanggal acara wajib diisi.',
            'event_date.after_or_equal' => 'Tanggal acara tidak boleh sebelum hari ini.',
            'event_address.required' => 'Alamat acara wajib diisi.',
            'menu_id.required' => 'Silakan pilih paket menu.',
            'quantity.min' => 'Jumlah pesanan minimal 1.',
        ];
    }
}
