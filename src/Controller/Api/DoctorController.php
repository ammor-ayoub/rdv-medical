<?php

namespace App\Controller\Api;

use App\Repository\DoctorRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
final class DoctorController extends AbstractController
{
    #[Route('/doctor/{id}', name: 'app_get_doctor')]
    public function getDoctor(int $id, DoctorRepository $doctorRepository): JsonResponse
    {
        $doctor = $doctorRepository->find($id);
        return $this->json([
            $doctor,
        ]);
    }
}
