<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Makarons;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'clientID' => function () {
                return Client::inRandomOrder()->first()->id;
            },
            'productName' => function () {
                return Makarons::inRandomOrder()->first()->name;
            },
            'rating' => $this->faker->numberBetween(0, 5),
            'comment' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('-10 days'),
        ];
    }
}
