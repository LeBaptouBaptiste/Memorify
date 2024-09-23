<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UploadMediaController extends AbstractController
{
    #[Route('/uploadmedia', name: 'app_upload_media')]
    public function index(): Response
    {
        return $this->render('upload_media/index.html.twig', [
            'controller_name' => 'UploadMediaController',
        ]);
    }
}
