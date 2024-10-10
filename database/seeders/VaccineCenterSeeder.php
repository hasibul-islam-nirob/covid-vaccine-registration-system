<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centers = [
            ['name' => 'Center 1', 'daily_limit' => 50],
            ['name' => 'Center 2', 'daily_limit' => 60],
            ['name' => 'Center 3', 'daily_limit' => 40]
        ];

        foreach ($centers as $center) {
            VaccineCenter::create($center);
        }
    }
}
