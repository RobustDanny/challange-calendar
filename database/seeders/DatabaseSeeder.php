<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Day;
use App\Models\Month;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->has(Month::factory(12)->has(Day::factory(31)))->create();

        // ->each(function ($month) {
        //         for ($i = 1; $i <= 31; $i++) {
        //         Day::factory()->for($month)->create();
        //         }
        //         });




    }
}