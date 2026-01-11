<?php

declare(strict_types=1);

namespace App\Component\User;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function create(
        string $email,
        string $password,
        string $fullname,
        string $surname,
        int $age
    ): User
    {
        $user = new User();

        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $password);

        $user->setEmail($email);
        $user->setPassword($hashedPassword);
        $user->setFullname($fullname);
        $user->setSurname($surname);
        $user->setAge($age);

        return $user;
    }
}
