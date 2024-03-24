<?php

declare(strict_types=1);

namespace App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Repository;

use App\Domain\FireBrigadeUnit\Entity\FireBrigadeUnit;
use App\Domain\FireBrigadeUnit\Repository\FireBrigadeUnitRepositoryInterface;
use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Model\FireBrigadeUnit as FireBrigadeUnitModel;

/**
 * Adapter for @see FireBrigadeUnitRepositoryInterface
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnitEloquentRepository implements FireBrigadeUnitRepositoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function save(FireBrigadeUnit $fireBrigadeUnit): void
    {
        FireBrigadeUnitModel::create([
            'name' => $fireBrigadeUnit->getName(),
            'superior_fire_brigade_unit_id' => $fireBrigadeUnit->getSuperiorFireBrigadeUnit()?->getId(),
        ]);
    }

    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getById(int $id): ?FireBrigadeUnit
    {
        $eloquentModel = FireBrigadeUnitModel::find($id);
        if (! $eloquentModel) {
            return null;
        }

        return new FireBrigadeUnit(
            $eloquentModel->name,
            $eloquentModel->id,
            $eloquentModel->superiorFireBrigadeUnit
        );
    }
}
