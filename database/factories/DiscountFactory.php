<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DiscountFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $startDate = $this->faker->dateTimeBetween('-5 weeks', '+5 weeks');
        return [
            'code' => Str::random(5),
            'amount' => $this->faker->randomFloat(2, .2, .8),
            'startDate' => $startDate,
            'endDate' => $this->faker->dateTimeBetween($startDate, '+7 weeks'),
        ];
    }
}
