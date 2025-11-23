<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DemoController extends AbstractController
{
    #[Route('/demo', name: 'app_demo')]
    public function index(): Response
    {
        $hackathons = [
            [
                'id' => 1,
                'theme' => 'IA & Pédagogie',
                'ville' => 'Nantes',
                'lieu'  => 'La Colinière',
                'debut' => new \DateTimeImmutable('2025-11-22 09:00'),
                'fin'   => new \DateTimeImmutable('2025-11-23 18:00'),
                'places' => 120,
                'affiche' => 'images/affiche1.png',
            ],
            [
                'id' => 2,
                'theme' => 'Cyber & Santé',
                'ville' => 'Rennes',
                'lieu'  => 'Campus Numérique',
                'debut' => new \DateTimeImmutable('2025-12-05 09:00'),
                'fin'   => new \DateTimeImmutable('2025-12-06 18:00'),
                'places' => 80,
                'affiche' => null,
            ],
        ];

        return $this->render('demo/index.html.twig', [
            'titre_page' => 'Liste des hackathons',
            'hackathons' => $hackathons,
            'connected'  => true,
            'controller_name' => 'Morgane'
        ]);
    }
}
