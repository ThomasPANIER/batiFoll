<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;

// use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

// /**
//  * Require ROLE_ADMIN for *every* controller method in this class.
//  *
//  * @IsGranted("IS_AUTHENTICATED_FULLY")
//  */


class FrontBatiFollController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'index')]
    // #[Route('/', methods: ['GET'], name: 'index')]
    // #[Route('/front/bati/foll', name: 'front_bati_foll')]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('front_bati_foll/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }
}
