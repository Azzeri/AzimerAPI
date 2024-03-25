<?php

declare(strict_types=1);

namespace App\Domain\User\Aggregate;

use App\Domain\User\Repository\UserRepositoryInterface;

/**
 * Aggregate for users
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class UserAggregate
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }
}
