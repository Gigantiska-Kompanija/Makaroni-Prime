<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Division::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $city = $this->faker->city;
        return [
            'name' => $city . ' ' . $this->faker->numberBetween(0, 200),
            'location' => $city,
            'isOperating' => $this->faker->boolean,
        ];
    }
}
