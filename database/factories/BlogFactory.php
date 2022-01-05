<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 1,
            'thumbnail' => '/userfiles/images/coding_logo.png',
            'topic_id' => rand(1, 20),
            'created_at' => Carbon::now()->subDays(rand(1, 100)),
        ];
    }
}
