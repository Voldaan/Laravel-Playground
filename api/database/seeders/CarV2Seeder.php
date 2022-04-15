<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarV2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_v2_s')->insert([
            [
                'name' => 'Impreza',
                'brand' => 'Subaru',
                'bodytype' => 'Sedan',
                'doors' => 4,
                'engine_id' => 1
            ],
            [
                'name' => 'Civic Type-R',
                'brand' => 'Honda',
                'bodytype' => 'Hatchback',
                'doors' => 2,
                'engine_id' => 3
            ],
            [
                'name' => 'Toyota',
                'brand' => 'Supra',
                'bodytype' => 'Coupe',
                'doors' => 2,
                'engine_id' => 2
            ]
        ]
        );
    }
}
