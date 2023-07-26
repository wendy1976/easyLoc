<?php

nameSpace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController {
    public function bonjour() 
    {
        return new Response("Voici la base de données d'EasyLoc'");
    }
}