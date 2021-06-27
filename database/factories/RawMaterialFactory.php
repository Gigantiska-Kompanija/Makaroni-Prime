<?php

namespace Database\Factories;

use App\Models\RawMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class RawMaterialFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RawMaterial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'name' => $this->faker->unique()->text(1),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'quantity' => $this->faker->numberBetween(0, 2000),
            'minimum' => $this->faker->numberBetween(0, 3000),
        ];
    }
}
