<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

/**
 * Class representing user's domain entity
 *
 * @author Mariusz Waloszczyk <azmario2698@gmail.com>
 */
class User
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private string $password,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
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
