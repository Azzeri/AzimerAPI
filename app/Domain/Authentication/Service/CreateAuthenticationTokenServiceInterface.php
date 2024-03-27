<?php

declare(strict_types=1);

namespace App\Domain\Authentication\Service;

use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\User\Entity\User;

/**
 * Interface for a service creating authentication token
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
interface CreateAuthenticationTokenServiceInterface
{
    /**
     * Generates token for user
     *
     * @throws AuthenticationException
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function createAuthenticationToken(User $user): void;
}
