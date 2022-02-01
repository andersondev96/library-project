<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->isbn13,
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'author' => $this->faker->name,
            'publishing_company' => $this->faker->jobTitle,
            'publication_place' => $this->faker->city,
            'publication_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'publisher_number' => $this->faker->randomDigit,
            'available_quantity' => $this->faker->randomDigit,
            'borrowed_amounts' => $this->faker->randomDigit,

        ];
    }
}
