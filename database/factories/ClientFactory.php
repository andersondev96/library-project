<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->postcode,
            'rg' => $this->faker->postcode,
            'name' => $this->faker->name,
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address_id' => Address::factory(),
            'email' => $this->faker->email,
            'telephone' => $this->faker->tollFreePhoneNumber,
            'type' => $this->faker->word,
            'department' => $this->faker->jobTitle,
            'books' => $this->faker->randomDigit,
            'traffic_ticket' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10)
        ];
    }
}
