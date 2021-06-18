<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Machinery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MachineryFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Machinery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $purchaseDate = $this->faker->dateTimeBetween('-20 years');
        $lastServiced = $this->faker->optional()->dateTimeBetween($purchaseDate);
        return [
            'serialNumber' => Str::random(24),
            'function' => $this->faker->optional()->text,
            'located' => function () {
                return Division::inRandomOrder()->first()->name;
            },
            'model' => $this->faker->optional()->word,
            'isOperating' => $this->faker->boolean,
            'lastServiced' => $lastServiced,
            'needsMaintenance' => $this->faker->boolean(10),
            'purchaseDate' => $purchaseDate,
            'decommissionDate' => $this->faker->dateTimeBetween($lastServiced),
        ];
    }
}
