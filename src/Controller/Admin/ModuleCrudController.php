<?php

namespace App\Controller\Admin;

use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ModuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->onlyOnIndex()->setColumns(6),
                TextField::new('nom', 'Module_Name')->setColumns(6),
                TextField::new('description', 'Description')->setColumns(6),
                AssociationField::new('dependentModule', 'Module dependant'),
               ];
    }

}
