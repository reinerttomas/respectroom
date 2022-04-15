<?php
declare(strict_types=1);

namespace App\Tests\Service;

use App\Exception\ORM\NotFoundException;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserServiceTest extends KernelTestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->userService = $container->get(UserService::class);
    }

    public function testList(): void
    {
        $users = $this->userService->list();

        self::assertIsArray($users);
        self::assertEquals(2, count($users));
    }

    /**
     * @dataProvider provideGetData
     * @throws NotFoundException
     */
    public function testGet(array $data): void
    {
        $user = $this->userService->get($data['id']);

        self::assertEquals($data['id'], $user->getId());
        self::assertEquals($data['name'], $user->getName());
        self::assertEquals($data['surname'], $user->getSurname());
        self::assertEquals($data['email'], $user->getEmail());
        self::assertEquals($data['createdAt'], $user->getCreatedAt()->format('Y-m-d H:i:s'));
        self::assertEquals($data['updatedAt'], $user->getUpdatedAt()?->format('Y-m-d H:i:s'));
    }

    public function testGetNotFound(): void
    {
        self::expectException(NotFoundException::class);
        self::expectExceptionMessage('User not found. ID: 1000');

        $this->userService->get(1000);
    }

    public function provideGetData(): iterable
    {
        yield[
            [
                'id' => 1,
                'name' => 'Admin',
                'surname' => 'Respectroom',
                'email' => 'admin@respectroom.cz',
                'password' => 'Admin123!',
                'roles' => [
                    'USER_ROLE',
                ],
                'createdAt' => '2020-01-01 08:00:00',
                'updatedAt' => null,
            ],
        ];

        yield[
            [
                'id' => 2,
                'name' => 'Test',
                'surname' => 'Respectroom',
                'email' => 'test@respectroom.cz',
                'password' => 'Test123!',
                'roles' => [
                    'USER_ROLE',
                ],
                'createdAt' => '2020-01-01 08:00:00',
                'updatedAt' => null,
            ],
        ];
    }
}
