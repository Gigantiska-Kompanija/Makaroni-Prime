<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        $joinDate = $this->faker->dateTimeBetween('-10 years', '-1 week');
        return [
            'personalId' => (string) $this->faker->unique()->numberBetween(10000000000, 100000000000),
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phoneNumber' => $this->faker->unique()->phoneNumber,
            'joinDate' => $joinDate,
            'leaveDate' => $this->faker->optional(.1)->dateTimeBetween($joinDate),
            'position' => $this->faker->optional()->randomElement(),
            'pay' => $this->faker->optional(.8)->randomFloat(2, 5, 20),
        ];
    }
}
