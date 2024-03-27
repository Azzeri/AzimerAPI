<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\User;

/**
 * Interface describing repository operations for users
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * Returns user by given ID from repository or null if not found
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getById(int $id): ?User;

    /**
     * Returns user by given email from repository or null if not found
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getByEmail(string $email): ?User;
}
