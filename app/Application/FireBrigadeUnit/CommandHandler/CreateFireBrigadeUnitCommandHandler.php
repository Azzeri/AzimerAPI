<?php

declare(strict_types=1);

namespace App\Application\FireBrigadeUnit\CommandHandler;

use App\Application\FireBrigadeUnit\Command\CreateFireBrigadeUnitCommand;
use App\Domain\FireBrigadeUnit\Aggregate\FireBrigadeUnitAggregate;
use App\Domain\FireBrigadeUnit\Dto\FireBrigadeUnitDto;
use Ecotone\Modelling\Attribute\CommandHandler;

/**
 * Handler for @see CreateFireBrigadeUnitCommand
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CreateFireBrigadeUnitCommandHandler
{
    public function __construct(
        private readonly FireBrigadeUnitAggregate $fireBrigadeUnitAggregate
    ) {
    }

    #[CommandHandler]
    public function handle(CreateFireBrigadeUnitCommand $command): void
    {
        $fireBrigadeUnitDto = new FireBrigadeUnitDto(
            $command->getName(),
            $command->getSuperiorFireBrigadeUnitId()
        );

        $this->fireBrigadeUnitAggregate->createFireBrigadeUnit($fireBrigadeUnitDto);
    }
}
