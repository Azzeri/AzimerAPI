<?php

declare(strict_types=1);

namespace App\Domain\Authentication\ValueObject;

/**
 * Value object representing user password
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class Password
{
    public function __construct(
        private readonly string $password,
    ) {
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
