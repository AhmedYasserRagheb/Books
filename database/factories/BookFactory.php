<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'auther'=> fake()->name,
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => function(array $attributes){
                return fake()->dateTimeBetween($attributes['created_at'], 'now');
            }
        ];
    }
}
