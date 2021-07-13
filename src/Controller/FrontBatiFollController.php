<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontBatiFollController extends AbstractController
{
    #[Route('/front/bati/foll', name: 'front_bati_foll')]
    public function index(): Response
    {
        return $this->render('front_bati_foll/index.html.twig', [
            'controller_name' => 'FrontBatiFollController',
        ]);
    }
}
