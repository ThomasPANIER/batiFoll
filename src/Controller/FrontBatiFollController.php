<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ProjectRepository;

class FrontBatiFollController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'index')]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('front_bati_foll/index.html.twig', [
            'projects' => $projectRepository->findBy(
                [],
                ['deadline' => 'ASC'],
            ),
        ]);
    }
}
