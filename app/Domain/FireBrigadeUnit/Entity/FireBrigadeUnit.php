<?php

declare(strict_types=1);

namespace App\Domain\FireBrigadeUnit\Entity;

/**
 * Class representing fire brigade unit's domain entity
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class FireBrigadeUnit
{
    public function __construct(
        private string $name,
        private ?int $id = null,
        private ?self $superiorFireBrigadeUnit = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperiorFireBrigadeUnit(): ?self
    {
        return $this->superiorFireBrigadeUnit;
    }
}
