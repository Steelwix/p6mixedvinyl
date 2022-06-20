<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('api/song/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        //DATABASE
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://www.youtube.com/watch?v=C1HkdpbhEEo'
        ];

        $logger->info('Returning API response for song {song}', [
            'song' => $id,
        ]);

        return new JsonResponse($song);
        //Same response : return $this->json($song);
    }
}