<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\UnicodeString;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['artist' => 'Machine Gun Kelly, glaive', 'song' => 'more than life'],
            ['artist' => 'GG Magree, Royal & The Serpent', 'song' => 'BITCH'],
            ['artist' => 'Rival', 'song' => 'Oblivion'],
            ['artist' => 'Electric Callboy', 'song' => 'Hate/Love'],
            ['artist' => 'Grabbitz', 'song' => 'Die For You']
        ];
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {


            $title = new UnicodeString(str_replace('-', ' ', $slug));
            $title->title(true);
            return new Response('Genre : ' . $title);
        } else {
            return new Response('What are you looking for?');
        }
    }
}
