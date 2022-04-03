<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Exception\ORM\NotFoundException;
use App\Repository\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function get(int $id): User
    {
        return $this->userRepository->get($id);
    }

    /**
     * @throws NotFoundException
     */
    public function getByEmail(string $email): User
    {
        return $this->userRepository->getByEmail($email);
    }
}
