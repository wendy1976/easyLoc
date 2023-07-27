<?php

namespace App\Controller;

use App\Entity\Billing;
use App\Form\BillingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Création de la page du formulaire de paiement
class BillingController extends AbstractController
{
    #[Route('/formbilling', name: 'formbilling')]
    public function index(Request $request)//Request permet de récupérer les données
    {

        $billing = new Billing();//instance de l'entité
        //Méthode pour afficher le formulaire, avec une variable $contractform qui stocke le formulaire
        //et la méthode CreateForm 
        $billingform = $this->createForm(BillingType::class, $billing); 
        //Pour récupérer les infos tapées dans le formulaire
        $billingform->handleRequest($request);


        //Condition pour vérifier que les données sont valides et pouvoir les insérer dans une BDD
        if($billingform->isSubmitted() && $billingform->isValid())
        {
            //affiche les informations du formulaire
            dump($request->request->all());
        } 

        return $this->render('billing/index.html.twig', [
            //Passe la variable dans le template twig, et permet l'affichage avec createView
            'billingform' => $billingform->createView()     
        ]);
    }
}
