<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'size_id' => Size::factory(),
            'color_id' => Color::factory(),
            'inventory' => $this->faker->numberBetween(0, 100),
            'weight' => $this->faker->randomFloat(2, 0.01, 100),
            'status' => $this->faker->randomElement([0, 1]),
            'sku' => $this->faker->unique()->ean13,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            
            //
        ];
    }
}
