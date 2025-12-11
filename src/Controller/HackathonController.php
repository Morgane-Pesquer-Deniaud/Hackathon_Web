<?php

namespace App\Controller;
use App\Service\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

final class HackathonController extends AbstractController{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(ApiClient $api, RequestStack $stack): Response
    {

        try {
            $list = $api->get('/api/hackathons', withAuth: false);
            $hackathons = $list['hydra:member'] ?? $list['member'] ?? [];
        } catch (Throwable $e) {
            $hackathons = [];
            if ($stack->getSession()) {
                $this->addFlash('error', 'Impossible de récupérer les hackathons (API) : '.$e->getMessage());
            }
        }

        return $this->render('hackathon/index.html.twig', [
            'hackathons' => $hackathons,
        ]);
    }
}
