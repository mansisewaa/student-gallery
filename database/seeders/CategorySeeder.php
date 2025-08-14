<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'UPPER WEAR',
            'BOTTOM WEAR',
            'SCHOOL DRESSES',
            'WINTER WEAR',
            'SPORTS WEAR',
            'TRACK SUITS',
            'BLAZER',
            'TIES',
            'ACCESSORIES',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
