<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stock = $this->faker->randomNumber();
        return [
            'code' => $this->faker->isbn13(),
            'name' => $this->faker->sentence(),
            'unit' => $this->faker->randomElement(Product::availableUnits()),
            'initial_stock' => $stock,
            'current_stock' => $stock,
        ];
    }
}
