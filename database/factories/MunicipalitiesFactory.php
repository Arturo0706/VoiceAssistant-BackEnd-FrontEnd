<?php

namespace Database\Factories;

use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'state_id' => States::inRandomOrder()->first(),
        ];
    }
}
