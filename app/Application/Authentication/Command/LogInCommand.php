<?php

declare(strict_types=1);

namespace App\Application\Authentication\Command;

/**
 * Command authenticating user
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class LogInCommand
{
    public function __construct(
        private readonly string $email,
        private readonly string $password,
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
