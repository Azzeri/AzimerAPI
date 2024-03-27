<?php

declare(strict_types=1);

namespace Tests\Feature\Controller\FireBrigadeUnit;

use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Model\FireBrigadeUnit;
use Tests\Helpers\AbstractDbTestCase;

/**
 * Class testing creating new fire brigade unit operation
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CreateFireBrigadeUnitControllerTest extends AbstractDbTestCase
{
    /**
     * Case: Create fire brigade unit without superior unit id
     * Expected: Valid response and record present in db
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function testControllerWithoutSuperiorUnit(): void
    {
        // Arrange
        $requestData = [
            'name' => 'test fb unit',
            'superiorFireBrigadeUnitId' => null,
        ];

        // Act
        $response = $this->postJson('/api/fireBrigadeUnit', $requestData);

        // Assert
        $response->assertOk();
        $this->assertDatabaseHas('fire_brigade_units', [
            'name' => 'test fb unit',
            'superior_fire_brigade_unit_id' => null,
        ]);
    }

    /**
     * Case: Create fire brigade unit with superior unit id
     * Expected: Valid response and record present in db
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function testControllerWithSuperiorUnit(): void
    {
        // Arrange
        $parentUnit = FireBrigadeUnit::factory()->create();
        $requestData = [
            'name' => 'test fb unit',
            'superiorFireBrigadeUnitId' => $parentUnit->id,
        ];

        // Act
        $response = $this->postJson('/api/fireBrigadeUnit', $requestData);

        // Assert
        $response->assertOk();
        $this->assertDatabaseHas('fire_brigade_units', [
            'name' => 'test fb unit',
            'superior_fire_brigade_unit_id' => $parentUnit->id,
        ]);
    }
}
