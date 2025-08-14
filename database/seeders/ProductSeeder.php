<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['UPPER WEAR', 'HALF SHIRT (L/INFANT) SBGJ', 'UNISEX'],
            ['UPPER WEAR', 'HALF SHIRT SBGJ', 'UNISEX'],
            ['UPPER WEAR', 'HALF SHIRT SBGJ XI', 'UNISEX'],
            ['UPPER WEAR', 'FULL SHIRT CREAM SBGJ', 'UNISEX'],
            ['BOTTOM WEAR', 'PANT GREY', 'BOYS'],
            ['SCHOOL DRESSES', 'FROCK', 'GIRLS'],
            ['WINTER WEAR', 'SWEATER FULL', 'UNISEX'],
            ['SPORTS WEAR', 'HOUSE T-SHIRT', 'UNISEX'],
            ['ACCESSORIES', 'ID CARD', 'UNISEX'],
        ];

        foreach ($products as [$categoryName, $productName, $gender]) {
            $category = DB::table('categories')->where('name', $categoryName)->first();

            if (!$category) continue;

            // Check if product already exists by name
            $existing = DB::table('products')->where('name', $productName)->exists();

            if (!$existing) {
                DB::table('products')->insert([
                    'name' => $productName,
                    'description' => $productName . ' product description',
                    'gender' => $gender,
                    'sku' => strtoupper(Str::slug($productName)) . '-' . rand(1000, 9999),
                    'price' => rand(100, 500),
                    'category_id' => $category->id,
                    'is_active' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
