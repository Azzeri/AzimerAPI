<?php

declare(strict_types=1);

namespace App\Domain\FireBrigadeUnit\Repository;

use App\Domain\FireBrigadeUnit\Entity\FireBrigadeUnit;

/**
 * Interface describing repository operations for fire brigade units
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
interface FireBrigadeUnitRepositoryInterface
{
    /**
     * Creates new fire brigade unit and saves it in the repository
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function save(FireBrigadeUnit $fireBrigadeUnit): void;

    /**
     * Returns fire brigade unit by given ID from repository or null if not found
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getById(int $id): ?FireBrigadeUnit;
}
