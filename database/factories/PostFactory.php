<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $web = Website::inRandomOrder()->first();

        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->title(),
            'desc' => $this->faker->text(),
            'website_id' => $web->id
        ];
    }
}
