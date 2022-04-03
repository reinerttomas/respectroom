<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Security\Admin\User as UserSecurity;
use App\Utils\Calendar\DateTimeProviderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
        private DateTimeProviderInterface $dateTimeProvider,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->getUsers() as $data) {
            $user = new User(
                $data['name'],
                $data['surname'],
                $data['email'],
                $this->dateTimeProvider->createImmutable(),
            );

            $manager->persist($user);
            $manager->flush();

            $userSecurity = new UserSecurity(
                $user->getId(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getRoles(),
            );

            $password = $this->hasher->hashPassword($userSecurity, $data['password']);
            $user->changePassword($password);

            $manager->persist($user);
            $manager->flush();
        }
    }

    /**
     * @return iterable<array{'name': string, 'surname': string, 'email': string, 'password': string}>
     */
    private function getUsers(): iterable
    {
        yield[
            'name' => 'Admin',
            'surname' => 'Respectroom',
            'email' => 'admin@respectroom.cz',
            'password' => 'Admin123!',
        ];

        yield[
            'name' => 'Test',
            'surname' => 'Respectroom',
            'email' => 'test@respectroom.cz',
            'password' => 'Test123!',
        ];
    }
}
