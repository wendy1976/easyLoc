<?php


namespace App\Controller;

use App\Repository\ContractRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContractListController extends AbstractController
{
    #[Route('/contract', name: 'contract_list')]
    public function listContracts(ContractRepository $contractRepository): Response
    {
        // Récupérer tous les contrats depuis le repository
        $contracts = $contractRepository->findAll();

        // Rendre la vue avec les contrats
        return $this->render('contract_list/index.html.twig', [
            'contracts' => $contracts,
        ]);
    }
}