<?php

declare(strict_types=1);

namespace App\UserInterface\Controller\FireBrigadeUnit;

use App\Application\FireBrigadeUnit\Command\CreateFireBrigadeUnitCommand;
use App\UserInterface\Controller\Controller;
use Ecotone\Modelling\CommandBus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controller for creating a new fire brigade unit
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CreateFireBrigadeUnitController extends Controller
{
    public function __construct(
        private readonly CommandBus $commandBus
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'superiorFireBrigadeUnitId' => 'nullable|integer',
        ]);

        $command = new CreateFireBrigadeUnitCommand(
            $request->get('name'),
            $request->get('superiorFireBrigadeUnitId')
        );

        try {
            $this->commandBus->send($command);
        } catch (\Throwable) {
            return $this->getInternalErrorResponse();
        }

        return $this->getSuccessfulJsonResponse();
    }
}
