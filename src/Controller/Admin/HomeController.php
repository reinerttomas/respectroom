<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'admin_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render(
            'admin/home/index.html.twig',
            [
                'controller_name' => 'HomeController',
            ],
        );
    }
}
