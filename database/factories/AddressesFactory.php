<?php

namespace Database\Factories;

use App\Models\Municipalities;
use App\Models\States;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'suburb' => $this->faker->country,
            'street' => $this->faker->streetName,
            'street_numer' => $this->faker->buildingNumber,
            'home_number' => $this->faker->buildingNumber,
            'references' => $this->faker->text,
            'phone' => $this->faker->buildingNumber,
            'state_id' => States::inRandomOrder()->first(),
            'municipality_id' => Municipalities::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
        
        ];
    }
}
