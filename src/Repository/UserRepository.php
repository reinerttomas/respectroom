<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use App\Exception\ORM\NotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class UserRepository
 *
 * @package App\Repository
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return array<User>
     */
    public function list(): array
    {
        return $this->findAll();
    }

    /**
     * @throws NotFoundException
     */
    public function get(int $id): User
    {
        $user = $this->find($id);

        if ($user === null) {
            throw new NotFoundException('User not found. ID: ' . $id);
        }

        return $user;
    }

    /**
     * @throws NotFoundException
     */
    public function getByEmail(string $email): User
    {
        $user = $this->findByEmail($email);

        if ($user === null) {
            throw new NotFoundException('User not found. Email: ' . $email);
        }

        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function store(User $user): User
    {
        $em = $this->getEntityManager();

        $em->persist($user);
        $em->flush();

        return $user;
    }
}
