<?php

declare(strict_types=1);

namespace App\Application\FireBrigadeUnit\Command;

/**
 * Command creating a new fire brigade unit
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CreateFireBrigadeUnitCommand
{
    public function __construct(
        private readonly string $name,
        private readonly ?int $superiorFireBrigadeUnitId = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSuperiorFireBrigadeUnitId(): ?int
    {
        return $this->superiorFireBrigadeUnitId;
    }
}
