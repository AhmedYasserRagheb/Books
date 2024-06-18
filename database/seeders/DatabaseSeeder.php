<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Book::factory(10)->create()->each(function (Book $book) {
            $numberOfReviews = random_int(1, 10);
            // $numberOfReviews = 5;
            Review::factory()
                ->count($numberOfReviews)
                ->excellent()
                ->for($book)
                ->create();
        });

        Book::factory(10)->create()->each(function (Book $book) {
            $numberOfReviews = random_int(1, 10);
            Review::factory()
                ->count($numberOfReviews)
                ->good()
                ->for($book)
                ->create();
        });


        Book::factory(10)->create()->each(function (Book $book) {
            $numberOfReviews = random_int(1, 10);
            Review::factory()
                ->count($numberOfReviews)
                ->bad()
                ->for($book)
                ->create();
        });
    }
}
