<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'orderDate' => $this->faker->dateTimeBetween('-10 days'),
            'total' => $this->faker->numberBetween(),
        ];
    }
}
