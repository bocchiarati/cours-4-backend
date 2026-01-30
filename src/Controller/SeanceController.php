<?php

namespace App\Controller;

use App\Repository\ExerciceRepository;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SeanceController extends AbstractController
{
    #[Route('/seances', name: 'app_seances')]
    public function index(SeanceRepository $s_repo): Response
    {
        return $this->render('seance/index.html.twig', [
            'seances' => $s_repo->findAll(),
        ]);
    }

    #[Route('/seance/{id}', name: 'app_seance_create')]
    public function seances(SeanceRepository $s_repo, ExerciceRepository $exerciceRepository, $id): Response
    {
        $seance = $s_repo->findWithExercises($id);
        $exercice = $seance->getExercises();
        return $this->render('seance/seance.html.twig', [
            "exercise"  => $exercice,
        ]);
    }
}
