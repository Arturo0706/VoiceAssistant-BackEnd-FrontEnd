<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'total' => $this->faker->buildingNumber(),
            'user_id' => User::inRandomOrder()->first(),
            'product_id' => Product::inRandomOrder()->first(),
        ];
    }
}
