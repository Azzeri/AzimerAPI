<?php

namespace Database\Factories\FireBrigadeUnit;

use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Model\FireBrigadeUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory creating test records for @see FireBrigadeUnit class
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnitFactory extends Factory
{
    protected $model = FireBrigadeUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->numerify('Unit-####'),
            'superior_fire_brigade_unit_id' => null,
        ];
    }

    /**
     * Indicate that the model has a superior fire brigade unit
     */
    public function withSuperiorFireBrigadeUnit(): static
    {
        return $this->state(fn (array $attributes) => [
            'superior_fire_brigade_unit_id' => FireBrigadeUnit::factory(),
        ]);
    }
}
