<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    #[Route('/hello/{name}', name: 'app_hello')]
    public function hello(string $name): Response
    {
        return $this->render('home/hello.html.twig', [
            'name' => ucfirst($name),
        ]);
    }

    #[Route('/random', name: 'app_random')]
    public function random(): Response
    {
        $quotes = [
            "Le code est poésie.",
            "Symfony simplifie la complexité.",
            "Toujours tester, jamais supposer.",
            "Refactoriser, c'est améliorer."
        ];

        $randomQuote = $quotes[array_rand($quotes)];
        return $this->render('home/random.html.twig', [
            'quote' => $randomQuote,
        ]);
    }

    #[Route('/api/random', name: 'app_api_random')]
    public function apiRandom(): Response
    {
        $quotes = [
            "Le code est poésie.",
            "Symfony simplifie la complexité.",
            "Toujours tester, jamais supposer.",
            "Refactoriser, c'est améliorer."
        ];

        $randomQuote = $quotes[array_rand($quotes)];
        return new Response(
            json_encode(['quote' => $randomQuote]),
            200,
            ['Content-Type' => 'application/json']
        );
    }

    #[Route('/redirect', name: 'app_redirect')]
    public function redirectToAbout(): Response
    {
        return $this->redirectToRoute('app_random');
    }

    #[Route('/wrestlers', name: 'app_wrestler')]
    public function wrestlers(): Response
    {
        $wrestlers = [
            ['name' => 'John Cena', 'age' => 44, 'poids' => 115, 'champion' => false],
            ['name' => 'The Rock', 'age' => 49, 'poids' => 125, 'champion' => false],
            ['name' => 'Stone Cold Steve Austin', 'age' => 56, 'poids' => 115, 'champion' => false],
            ['name' => 'Hulk Hogan', 'age' => 68, 'poids' => 130, 'champion' => false],
            ['name' => 'Undertaker', 'age' => 55, 'poids' => 120, 'champion' => false],
            ['name' => 'Triple H', 'age' => 53, 'poids' => 115, 'champion' => false],
            ['name' => 'Shawn Michaels', 'age' => 57, 'poids' => 110, 'champion' => false],
            ['name' => 'Brock Lesnar', 'age' => 44, 'poids' => 120, 'champion' => true],
            ['name' => 'Roman Reigns', 'age' => 37, 'poids' => 115, 'champion' => true],
            ['name' => 'Seth Rollins', 'age' => 36, 'poids' => 110, 'champion' => true],
            ['name' => 'Big Show', 'age' => 46, 'poids' => 150, 'champion' => false],
            ['name' => 'Kane', 'age' => 53, 'poids' => 147, 'champion' => false],
            ['name' => 'Randy Orton', 'age' => 42, 'poids' => 110, 'champion' => true],
            ['name' => 'Edge', 'age' => 48, 'poids' => 100, 'champion' => false],
            ['name' => 'Chris Jericho', 'age' => 51, 'poids' => 105, 'champion' => false],
            ['name' => 'Bret Hart', 'age' => 64, 'poids' => 100, 'champion' => false],
            ['name' => 'Ric Flair', 'age' => 73, 'poids' => 100, 'champion' => true],
            ['name' => 'Mick Foley', 'age' => 57, 'poids' => 120, 'champion' => false],
            ['name' => 'Eddie Guerrero', 'age' => 38, 'poids' => 95, 'champion' => false],
            ['name' => 'Rey Mysterio', 'age' => 47, 'poids' => 90, 'champion' => false]
        ];

        return $this->render('home/wrestlers.html.twig', [
            'wrestlers' => $wrestlers,
        ]);
    }
}