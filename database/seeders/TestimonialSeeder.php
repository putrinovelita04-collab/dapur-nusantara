<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'customer_name' => 'Budi Santoso',
            'occasion' => 'Corporate Secretary, PT Telkom',
            'rating' => 5,
            'message' => 'Sangat puas dengan layanan Nasi Box Premium untuk acara RUPS kami. Rasanya juara, porsinya pas, dan pengantaran sangat tepat waktu sesuai jadwal.',
            'is_published' => true,
        ]);

        Testimonial::create([
            'customer_name' => 'Siti Rahmawati',
            'occasion' => 'Acara Pernikahan (Ritz-Carlton)',
            'rating' => 5,
            'message' => 'Prasmanan Tradisional dari Dapur Nusantara membuat hari pernikahan kami semakin berkesan. Tamu-tamu memuji rasa rendang dan sate ayamnya!',
            'is_published' => true,
        ]);

        Testimonial::create([
            'customer_name' => 'Aris Nugroho',
            'occasion' => 'Syukuran Rumah Baru',
            'rating' => 5,
            'message' => 'Tumpeng Agungnya sangat megah dan estetik! Hiasannya rapi sekali dan nasi kuningnya sangat gurih. Keluarga besar semua suka.',
            'is_published' => true,
        ]);
    }
}