<?php

declare(strict_types=1);

namespace App\Application\Authentication\CommandHandler;

use App\Application\Authentication\Command\LogInCommand;
use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\Authentication\Service\CheckPasswordServiceInterface;
use App\Domain\Authentication\Service\CreateAuthenticationTokenServiceInterface;
use App\Domain\Authentication\ValueObject\Password;
use App\Domain\User\Repository\UserRepositoryInterface;
use Ecotone\Modelling\Attribute\CommandHandler;

/**
 * Handler for @see LoginCommand
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class LoginCommandHandler
{
    public function __construct(
        private readonly CheckPasswordServiceInterface $checkPasswordService,
        private readonly CreateAuthenticationTokenServiceInterface $createAuthenticationTokenService,
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    /**
     * @throws AuthenticationException
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    #[CommandHandler]
    public function handle(LogInCommand $command): void
    {
        $user = $this->userRepository->getByEmail($command->getEmail());
        if (! $user) {
            throw new AuthenticationException('User with given email not found');
        }

        if (! $this->checkPasswordService->checkPassword($user, new Password($command->getPassword()))) {
            throw new AuthenticationException('Incorrect password');
        }

        $this->createAuthenticationTokenService->createAuthenticationToken($user);
    }
}
