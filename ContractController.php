<?php

namespace App\Controller;

use App\Entity\Contract;
use App\Form\ContractType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid; 

class ContractController extends AbstractController
{
    #[Route('/formcontract', name: 'formcontract')]
    public function index(Request $request)

    {
        $contract = new Contract(); 
        $contractform = $this->createForm(ContractType::class, $contract); 

        $contractform->handleRequest($request);

        if($contractform->isSubmitted() && $contractform->isValid())
        {
            //afficher les informations du formulaire
            dump($request->request->all());
        }    

        return $this->render('contract/index.html.twig', [
            'contractform' => $contractform->createView()    
        ]);
    }
}
