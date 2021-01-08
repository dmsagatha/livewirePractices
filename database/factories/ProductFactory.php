<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
  protected $model = Product::class;

  public function definition()
  {
    return [
      'name' => $this->faker->unique()->sentence($nbWords = 2),
      'price' => $this->faker->randomNumber(3),
    ];
  }
}
