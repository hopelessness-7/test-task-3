<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Москва'],
            ['name' => 'Санкт-Петербург'],
            ['name' => 'Владивосток'],
            ['name' => 'Краснодар'],
        ];

        DB::table('cities')->insert($cities);

        Participant::factory(200)->create();
    }
}
