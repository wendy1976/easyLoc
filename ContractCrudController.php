<?php

namespace App\Controller\Admin;

use App\Entity\Contract;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContractCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contract::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Les contrats')
            ->setEntityLabelInSingular('contrat')
            //->setDateFormat('d-m-Y', 'fr_FR')
            //->setTimeFormat('...')
            ->setPageTitle('index','Easy Loc - Administration des contrats')
            // ...
        ;
    }
    
    /*public function configureFields(string $pageName): iterable
    {
        return [
            MoneyField::new('price')->setCurrency('EUR'),
        ];
    }*/
    
}
