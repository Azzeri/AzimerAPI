<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Authentication\CommandHandler;

use App\Application\Authentication\Command\LogInCommand;
use App\Application\Authentication\CommandHandler\LoginCommandHandler;
use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\Authentication\Service\CheckPasswordServiceInterface;
use App\Domain\Authentication\Service\CreateAuthenticationTokenServiceInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use Tests\Helpers\AbstractDbTestCase;

/**
 * Test class for @see LoginCommandHandler
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class LoginCommandHandlerTest extends AbstractDbTestCase
{
    /**
     * Case: Handler with non-existing user
     * Expected: Exception message returned
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function testHandleUserNotFound(): void
    {
        // Arrange
        $gateway = $this->createMock(CheckPasswordServiceInterface::class);
        $gateway2 = $this->createMock(CreateAuthenticationTokenServiceInterface::class);
        $gateway3 = $this->createMock(UserRepositoryInterface::class);

        $command = new LogInCommand('randomemail@email.com', 'non-important-now');

        $processor = new LoginCommandHandler($gateway, $gateway2, $gateway3);
        $this->expectException(AuthenticationException::class);

        // Act // Assert
        $processor->handle($command);
    }

    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    protected function setUp(): void
    {
        $this->revokeAuthenticationToken();
    }
}
