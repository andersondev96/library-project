<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetAddress(),
            'number' => $this->faker->buildingNumber(),
            'district' => $this->faker->streetName(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state_id' => State::factory(),
        ];
    }
}
