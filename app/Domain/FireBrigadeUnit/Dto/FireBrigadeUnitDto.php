<?php

declare(strict_types=1);

namespace App\Domain\FireBrigadeUnit\Dto;

/**
 * Data transfer object for a fire brigade unit
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnitDto
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
