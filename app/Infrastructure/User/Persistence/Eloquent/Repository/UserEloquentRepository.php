<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Persistence\Eloquent\Repository;

use App\Domain\User\Entity\User;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\User\Persistence\Eloquent\Model\User as UserModel;

/**
 * Adapter for @see UserRepositoryInterface
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class UserEloquentRepository implements UserRepositoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getById(int $id): ?User
    {
        $eloquentModel = UserModel::find($id);
        if (! $eloquentModel) {
            return null;
        }

        return new User(
            $eloquentModel->id,
            $eloquentModel->name,
            $eloquentModel->email,
            $eloquentModel->password
        );
    }

    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function getByEmail(string $email): ?User
    {
        $eloquentModel = UserModel::where('email', $email)->first();
        if (! $eloquentModel) {
            return null;
        }

        return new User(
            $eloquentModel->id,
            $eloquentModel->name,
            $eloquentModel->email,
            $eloquentModel->password
        );
    }
}
