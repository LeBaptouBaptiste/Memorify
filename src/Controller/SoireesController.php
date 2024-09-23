<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SoireesController extends AbstractController
{
    #[Route('/soirees', name: 'app_soirees')]
    public function index(): Response
    {
        $baseDirectory = $this->getParameter('kernel.project_dir') . '/public/images/soirees/';
        $folders = [];

        // Get all subdirectories
        $directories = glob($baseDirectory . '*', GLOB_ONLYDIR);

        foreach ($directories as $dir) {
            $images = glob($dir . '/*.jpg'); // Gather images from the subdirectory

            // Create an array of image paths
            $folderImages = array_map(function ($image) use ($dir) {
                return '/images/soirees/' . basename($dir) . '/' . basename($image);
            }, $images);

            $folders[] = [
                'name' => basename($dir),
                'images' => $folderImages
            ];
        }

        return $this->render('soirees/index.html.twig', [
            'folders' => $folders,
        ]);
    }
}
