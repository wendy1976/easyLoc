<?php

namespace App\Controller;

use App\Repository\BillingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//Création de la page pour afficher la liste des paiements
class BillingListController extends AbstractController
{
    #[Route('/billing', name: 'billing_list')]
    public function listBillings(BillingRepository $billingRepository): Response

    {
        // Récupérer tous les paiements depuis le repository
        $billings = $billingRepository->findAll();

        // Rendre la vue avec les paiements
        return $this->render('billing_list/index.html.twig', [
            'billings' => $billings,
        ]);
    }
}
