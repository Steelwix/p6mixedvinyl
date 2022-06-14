<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\UnicodeString;

class VinylController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Title: PB and Jams');
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
