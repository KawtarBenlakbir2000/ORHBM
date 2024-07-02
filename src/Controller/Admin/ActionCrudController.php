<?php

namespace App\Controller\Admin;

use App\Entity\Action;
use App\Entity\Onglet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Action::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('nom', 'Fonctionnalite_Name'),
            TextField::new('description', 'Description'),
            TextField::new('code_source', 'Coude source'),
            AssociationField::new('onglet', 'Interface source'),
        ];
    }

}
