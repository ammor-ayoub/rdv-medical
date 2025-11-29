<?php

namespace App\Controller;

use App\Repository\DoctorProfileRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class DoctorController extends AbstractController
{
    #[Route('/doctor', name: 'app_doctor')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DoctorController.php',
        ]);
    }
    #[Route('/doctor/{id}', name: 'app_get_doctor')]
    public function getDoctor(int $id, UserRepository $userRepository): JsonResponse
    {
        $doctor = $userRepository->find($id);
        return $this->json([
            $doctor,
        ]);
    }
}
