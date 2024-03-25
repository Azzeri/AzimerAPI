<?php

namespace Database\Seeders;

use App\Infrastructure\User\Persistence\Eloquent\Model\User;
use Illuminate\Database\Seeder;

/**
 * Seeder for @see User class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(3)->create();
    }
}
