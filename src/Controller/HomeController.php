<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $baseDirectory = $this->getParameter('kernel.project_dir') . '/public/images/soirees/';
        $images = [];

        // Get all subdirectories
        $directories = glob($baseDirectory . '*', GLOB_ONLYDIR);

        foreach ($directories as $directory) {
            // Gather images from each subdirectory
            $subImages = glob($directory . '/*.jpg'); // Adjust file type as needed

            foreach ($subImages as $image) {
                // Create relative path
                $images[] = '/images/soirees/' . basename($directory) . '/' . basename($image);
            }
        }

        return $this->render('home/index.html.twig', [
            'images' => $images,
        ]);
    }
}
