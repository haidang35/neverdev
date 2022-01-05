<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(60),
            'body' => $this->faker->realText(200),
            'slug' => $this->faker->slug(),
            'meta_title' => $this->faker->realText(20),
            'meta_desc' => $this->faker->realText(50),
            'meta_key' => $this->faker->realText(20),
            'locale' => 'en',
            'author_id' => 1,
            'blog_id' => rand(1, 100),
        ];
    }
}
