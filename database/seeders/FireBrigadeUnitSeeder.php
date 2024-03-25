<?php

namespace Database\Seeders;

use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Model\FireBrigadeUnit;
use Illuminate\Database\Seeder;

/**
 * Seeder for @see FireBrigadeUnit class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnitSeeder extends Seeder
{
    public function run(): void
    {
        FireBrigadeUnit::factory()->create();
        FireBrigadeUnit::factory()->withSuperiorFireBrigadeUnit()->count(2)->create();
    }
}
