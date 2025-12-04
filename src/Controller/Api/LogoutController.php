<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class LogoutController extends AbstractController
{
    #[Route('/api/logout', name: 'app_logout')]
    public function index(): JsonResponse
    {
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
