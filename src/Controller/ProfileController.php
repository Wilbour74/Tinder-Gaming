<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/new', name: 'new_profile', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $submittedProfile = $form->getData();
            $request->getSession()->set('profile_data', $submittedProfile);

            return $this->redirectToRoute('show_profiles');
        }

        return $this->render('profile/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/profiles', name: 'show_profiles', methods: ['GET'])]
    public function profiles(Request $request): Response
    {
        $profile = $request->getSession()->get('profile_data');

        $existingProfiles = [
            [
                'name' => 'Alice Martin',
                'description' => 'Développeuse passionnée par les interfaces élégantes et les bonnes pratiques Symfony.',
                'seriousRelationship' => true,
                'birthdate' => new \DateTime('1998-04-12'),
                'email' => 'alice.martin@example.com',
            ],
            [
                'name' => 'Lucas Bernard',
                'description' => 'Chef de projet curieux, toujours à la recherche de solutions simples et efficaces.',
                'seriousRelationship' => false,
                'birthdate' => new \DateTime('1990-11-23'),
                'email' => 'lucas.bernard@example.com',
            ],
            [
                'name' => 'Sophie Dupont',
                'description' => 'Designer UI/UX qui aime concevoir des expériences fluides et modernes.',
                'seriousRelationship' => true,
                'birthdate' => new \DateTime('2001-02-06'),
                'email' => 'sophie.dupont@example.com',
            ],
        ];

        return $this->render('profile/profiles.html.twig', [
            'profile' => $profile,
            'existingProfiles' => $existingProfiles,
        ]);
    }
}
