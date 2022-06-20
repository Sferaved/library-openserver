<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realTextBetween($minNbChars = 10, $maxNbChars = 20, $indexSize = 2),
            'author_id' => random_int(1, 15),
            'description' => $this->faker->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'cover' => $this->faker->realTextBetween($minNbChars = 5, $maxNbChars = 10, $indexSize = 2),
            'category_id' => random_int(1, 4),
        ];
    }
}
