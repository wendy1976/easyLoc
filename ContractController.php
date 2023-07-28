<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid; 

//Création de la page du formulaire de contrat
class ContractController extends AbstractController
{
    #[Route('/formcontract', name: 'formcontract')]
    public function index(Request $request, ManagerRegistry $doctrine)//Request permet de récupérer les données
//Manager Registry: pour permettre d'insérer les données du formulaire dans la BDD
    {
        $contract = new Contract(); //instance de l'entité
        //Méthode pour afficher le formulaire, avec une variable $contractform qui stocke le formulaire
        //et la méthode CreateForm 
        $contractform = $this->createForm(ContractType::class, $contract); 
        //Pour récupérer les infos tapées dans le formulaire
        $contractform->handleRequest($request);


        //Condition pour vérifier que les données sont valides et pouvoir les insérer dans une BDD
        if($contractform->isSubmitted() && $contractform->isValid())
        {
            //afficher les informations du formulaire:
            //dump($request->request->all());

            //Méthodes qui permettent de récupérer les infos du formulaire et de les insérer dans la BDD
            $entitymanager = $doctrine->getManager();
            $contrat = $contractform->getData();

            $entitymanager->persist($contrat);
            $entitymanager->flush();
        }    

        return $this->render('contract/index.html.twig', [
            //Passe la variable dans le template twig, et permet l'affichage avec createView
            'contractform' => $contractform->createView()    
        ]);
    }
}
