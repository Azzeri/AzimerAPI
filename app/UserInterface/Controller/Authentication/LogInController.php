<?php

declare(strict_types=1);

namespace App\UserInterface\Controller\Authentication;

use App\Application\Authentication\Command\LogInCommand;
use App\Domain\Authentication\Exception\AuthenticationException;
use App\UserInterface\Controller\Controller;
use Ecotone\Modelling\CommandBus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

/**
 * Controller for authenticating user
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class LogInController extends Controller
{
    public function __construct(
        private readonly CommandBus $commandBus
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->getFailedValidationResponse($validator->errors());
        }

        $command = new LogInCommand(
            $request->get('email'),
            $request->get('password')
        );

        try {
            $this->commandBus->send($command);
        } catch (AuthenticationException $e) {
            return $this->getFailedResponseWithMessages(
                $e->getMessage(),
                403
            );
        } catch (\Throwable) {
            return $this->getInternalErrorResponse();
        }

        return $this->getSuccessfulJsonResponse();
    }
}
