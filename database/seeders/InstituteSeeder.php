<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 10; $i++) {
            DB::table('institutes')->insert([
                'name'    => 'Institute ' . $i,
                'address' => Str::random(10) . ', City ' . $i,
                'phone'   => '98765' . rand(10000, 99999),
            ]);
        }

    }
}
