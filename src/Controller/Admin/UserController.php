<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/user')]
class UserController extends AbstractController
{
    public function __construct(
        private UserService $userService,
    ) {
    }

    #[Route('/', name: 'admin_user', methods: ['GET'])]
    public function index(): Response
    {
        /** @var array<User> $users */
        $users = $this->userService->list();

        return $this->render(
            'admin/user/index.html.twig',
            [
                'users' => $users,
            ],
        );
    }
}
