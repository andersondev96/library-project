<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Client;
use App\Models\User;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'books_id' => Book::factory(),
            'loan_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'delivery_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'return_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'traffic_ticket' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
            'paid' => $this->faker->boolean,
            'client_id' => Client::factory(),
            'attendent_id' => User::factory(),

        ];
    }
}
