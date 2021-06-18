<?php

namespace Database\Factories;

use App\Models\Makarons;
use Illuminate\Database\Eloquent\Factories\Factory;

class MakaronsFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Makarons::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'name' => $this->faker->unique()->text(40),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'shape' => $this->faker->randomElement(),
            'color' => $this->faker->randomElement(),
            'length' => $this->faker->numberBetween(1, 400),
            'popularity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
