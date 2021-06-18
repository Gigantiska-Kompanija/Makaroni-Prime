<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Discount;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Machinery;
use App\Models\Makarons;
use App\Models\Manager;
use App\Models\Order;
use App\Models\RawMaterial;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $employees = Employee::factory(20)
            ->create();

        $divisions = Division::factory(10)
            ->hasAttached($employees)
            ->create();

        $rawMaterials = RawMaterial::factory(10)
            ->create();

        $machinery = Machinery::factory(10)
            ->hasAttached($rawMaterials)
            ->hasAttached($employees)
            ->create();

        Manager::factory(5)
            ->hasAttached($divisions)
            ->create();

        Client::factory(10)
            ->create();

        $makaroni = Makarons::factory(15)
            ->hasAttached($machinery, [], 'machinery')
            ->create();

        Discount::factory(5)
            ->hasAttached($makaroni, [], 'makaroni')
            ->create();

        Review::factory(10)
            ->create();

        Order::factory(10)
            ->hasAttached($makaroni, function () {
                return ['amount' => rand(1, 100), 'price' => rand(1, 20000)];
            }, 'makaroni')
            ->create();
    }
}
