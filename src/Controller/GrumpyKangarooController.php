<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GrumpyKangarooController extends AbstractController
{
    #[Route('/grumpy/kangaroo', name: 'app_grumpy_kangaroo')]
    public function index(): Response
    {
        return $this->render('grumpy_kangaroo/index.html.twig', [
            'controller_name' => 'GrumpyKangarooController',
        ]);
    }
}
