<?php

declare(strict_types=1);

namespace App\Domain\FireBrigadeUnit\Aggregate;

use App\Domain\FireBrigadeUnit\Dto\FireBrigadeUnitDto;
use App\Domain\FireBrigadeUnit\Entity\FireBrigadeUnit;
use App\Domain\FireBrigadeUnit\Repository\FireBrigadeUnitRepositoryInterface;

/**
 * Aggregate for fire brigade units
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnitAggregate
{
    public function __construct(
        private readonly FireBrigadeUnitRepositoryInterface $fireBrigadeUnitRepository
    ) {
    }

    /**
     * Creates a new fire brigade unit
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function createFireBrigadeUnit(FireBrigadeUnitDto $fireBrigadeUnitDto): void
    {
        $superiorFireBrigadeUnit = $fireBrigadeUnitDto->getSuperiorFireBrigadeUnitId()
            ? $this->fireBrigadeUnitRepository->getById($fireBrigadeUnitDto->getSuperiorFireBrigadeUnitId())
            : null;

        $fireBrigadeUnit = new FireBrigadeUnit(
            name: $fireBrigadeUnitDto->getName(),
            superiorFireBrigadeUnit: $superiorFireBrigadeUnit
        );
        $this->fireBrigadeUnitRepository->save($fireBrigadeUnit);
    }
}
