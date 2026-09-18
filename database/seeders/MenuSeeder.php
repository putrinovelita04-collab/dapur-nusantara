<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $nasiKotak = Category::where('slug', 'nasi-kotak')->first();
        $prasmanan = Category::where('slug', 'prasmanan')->first();
        $tumpeng = Category::where('slug', 'tumpeng')->first();
        $snackBox = Category::where('slug', 'snack-box')->first();

        Menu::create([
            'category_id' => $nasiKotak->id,
            'name' => 'Nasi Box Premium Ayam Bakar',
            'slug' => 'nasi-box-premium-ayam-bakar',
            'description' => 'Nasi putih hangat, ayam bakar bumbu kecap, sayur asem, sambal, dan kerupuk. Cocok untuk acara kantor maupun keluarga.',
            'price' => 28000,
            'min_order' => 20,
            'image' => 'https://images.unsplash.com/photo-1596797882087-effc4bc8ba3e?q=80&w=800',
            'is_featured' => true,
            'status' => 'aktif',
        ]);

        Menu::create([
            'category_id' => $prasmanan->id,
            'name' => 'Prasmanan Tradisional Nusantara',
            'slug' => 'prasmanan-tradisional-nusantara',
            'description' => 'Paket prasmanan lengkap dengan rendang, sate ayam, sayur lodeh, dan aneka lauk khas nusantara. Ideal untuk acara pernikahan.',
            'price' => 65000,
            'min_order' => 50,
            'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?q=80&w=800',
            'is_featured' => true,
            'status' => 'aktif',
        ]);

        Menu::create([
            'category_id' => $tumpeng->id,
            'name' => 'Tumpeng Agung Syukuran',
            'slug' => 'tumpeng-agung-syukuran',
            'description' => 'Tumpeng nasi kuning lengkap dengan lauk pauk tradisional dan hiasan cantik untuk acara syukuran atau ulang tahun.',
            'price' => 350000,
            'min_order' => 1,
            'image' => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?q=80&w=800',
            'is_featured' => true,
            'status' => 'aktif',
        ]);

        Menu::create([
            'category_id' => $snackBox->id,
            'name' => 'Snack Box Rapat Kantor',
            'slug' => 'snack-box-rapat-kantor',
            'description' => 'Aneka kue basah, roti, dan minuman kemasan untuk kebutuhan snack rapat atau seminar kantor.',
            'price' => 15000,
            'min_order' => 30,
            'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800',
            'is_featured' => true,
            'status' => 'aktif',
        ]);
    }
}