<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'name' => 'MX-5',
                'brand' => 'Mazda',
                'bodytype' => 'Roadster',
                'doors' => 2,
                'displacement' => 1.6,
                'engine_type' => 'I4'
            ],
            [
                'name' => 'RX-7',
                'brand' => 'Mazda',
                'bodytype' => 'Coupe',
                'doors' => 2,
                'displacement' => 1.8,
                'engine_type' => 'Wankel'
            ],
            [
                'name' => 'RX-8',
                'brand' => 'Mazda',
                'bodytype' => 'Coupe',
                'doors' => 2,
                'displacement' => 1.8,
                'engine_type' => 'Wankel'
            ]
        ]
        );
    }
}
