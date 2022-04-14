<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('engines')->insert([
            [
                'name' => 'EJ251',
                'displacement' => 2.5,
                'engine_type' => 'F4'
            ],
            [
                'name' => '2JZ-GTE',
                'displacement' => 3.0,
                'engine_type' => 'I6'
            ],
            [
                'name' => 'B16B',
                'displacement' => 1.6,
                'engine_type' => 'I4'
            ]
        ]);
    }
}
