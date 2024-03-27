<?php

declare(strict_types=1);

namespace App\Infrastructure\Authentication\Service;

use App\Domain\Authentication\Exception\AuthenticationException;
use App\Domain\Authentication\Service\CreateAuthenticationTokenServiceInterface;
use App\Domain\User\Entity\User;
use App\Infrastructure\User\Persistence\Eloquent\Model\User as UserModel;

/**
 * Adapter for @see CheckPasswordServiceInterface
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class CreateAuthenticationTokenServiceAdapter implements CreateAuthenticationTokenServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @author Mariusz Waloszczyk <azmario2698@gmail.com>
     */
    public function createAuthenticationToken(User $user): void
    {
        $userModel = UserModel::find($user->getId());
        if (! $userModel) {
            throw new AuthenticationException('User not found');
        }

        $userModel->createToken($user->getEmail());
    }
}
