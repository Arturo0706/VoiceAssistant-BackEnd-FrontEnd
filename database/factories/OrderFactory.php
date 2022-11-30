<?php

namespace Database\Factories;

use App\Models\Addresses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'status'=> $this->faker->state,
            'cantidad'=> $this->faker->buildingNumber,
            'total'=> $this->faker->buildingNumber,
            'shopping_id' => User::inRandomOrder()->first(),
            // 'address_id' => Addresses::inRandomOrder()->first(),
        ];
    }
}
