<?php
declare(strict_types=1);

namespace App\Business;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Utils\Calendar\DateTimeProviderInterface;

class UserBusiness
{
    public function __construct(
        private UserRepository $userRepository,
        private DateTimeProviderInterface $dateTimeProvider,
    ) {
    }

    private function create(
        string $name,
        string $surname,
        string $email,
    ): User {
        $user = new User(
            $name,
            $surname,
            $email,
            $this->dateTimeProvider->createImmutable(),
        );

        return $this->userRepository->store($user);
    }

    private function update(
        User $user,
        string $name,
        string $surname,
        string $email,
        ?string $password,
    ): User {
        $user->changeName($name, $surname)
            ->changeEmail($email)
            ->changePassword($password)
            ->changeUpdatedAt($this->dateTimeProvider->create());

        return $this->userRepository->store($user);
    }
}
