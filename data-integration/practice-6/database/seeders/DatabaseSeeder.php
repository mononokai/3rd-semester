<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Movie::factory(50)->create()->each(function ($movie) {
            $reviewCount = random_int(5, 15);

            Review::factory()->count($reviewCount)->for($movie)->create();
        });
    }
}
