<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Hotel;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::create([
            'external_id' => 1,
            'name' => 'Hotel_A'
        ]);

        Hotel::create([
            'external_id' => 1,
            'name' => 'Hotel_B'
        ]);
        
    }
}
