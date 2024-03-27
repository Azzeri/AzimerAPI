<?php

declare(strict_types=1);

namespace App\Infrastructure\Authentication\Service;

use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\Authentication\Service\CheckPasswordServiceInterface;
use App\Domain\Authentication\ValueObject\Password;
use App\Domain\User\Entity\User;
use App\Infrastructure\User\Persistence\Eloquent\Model\User as UserModel;
use Illuminate\Support\Facades\Hash;

/**
 * Adapter for @see CheckPasswordServiceInterface
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CheckPasswordServiceAdapter implements CheckPasswordServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function checkPassword(User $user, Password $password): bool
    {
        $userModel = UserModel::find($user->getId());
        if (! $userModel) {
            throw new AuthenticationException('User not found');
        }

        return Hash::check($password->getPassword(), $userModel->password);
    }
}
