<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->buildingNumber(),
            'size_id' => Size::inRandomOrder()->first(),
            'product_id' => Product::inRandomOrder()->first(),
        ];
    }
}
