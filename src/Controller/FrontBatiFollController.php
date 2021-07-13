<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 *
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */


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
