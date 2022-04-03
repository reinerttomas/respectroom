<?php
declare(strict_types=1);

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'public_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render(
            'public/home/index.html.twig',
            [
                'controller_name' => 'HomeController',
            ],
        );
    }
}
