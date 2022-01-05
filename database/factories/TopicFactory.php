<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'thumbnail' => '/userfiles/images/coding_logo.png',
            'slug' => $this->faker->slug(),
            'desc' => $this->faker->realText(20),
            'meta_title' => $this->faker->colorName(),
            'meta_desc' => $this->faker->realText(20),
            'meta_key' => $this->faker->realText(20),
        ];
    }
}
