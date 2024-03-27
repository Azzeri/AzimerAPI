<?php

declare(strict_types=1);

namespace App\Domain\Authentication\Service;

use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\Authentication\ValueObject\Password;
use App\Domain\User\Entity\User;

/**
 * Service checking if provided password is correct
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
interface CheckPasswordServiceInterface
{
    /**
     * Checks if password is correct
     *
     * @throws AuthenticationException
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function checkPassword(User $user, Password $password): bool;
}
