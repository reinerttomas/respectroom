<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'admin_user', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render(
            'admin/user/index.html.twig',
            [
                'controller_name' => 'UserController',
            ],
        );
    }
}
