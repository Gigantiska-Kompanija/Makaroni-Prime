<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'employee' => function() {
                return Employee::factory()->create()->personalId;
            },
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
