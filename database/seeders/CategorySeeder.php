<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Nasi Kotak',
            'slug' => 'nasi-kotak',
            'description' => 'Paket nasi kotak untuk berbagai acara.',
        ]);

        Category::create([
            'name' => 'Prasmanan',
            'slug' => 'prasmanan',
            'description' => 'Paket prasmanan untuk acara besar.',
        ]);

        Category::create([
            'name' => 'Tumpeng',
            'slug' => 'tumpeng',
            'description' => 'Paket tumpeng untuk acara syukuran.',
        ]);

        Category::create([
            'name' => 'Snack Box',
            'slug' => 'snack-box',
            'description' => 'Paket snack box untuk acara kantor/rapat.',
        ]);
    }
}