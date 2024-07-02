<?php

namespace App\Controller\Admin;

use App\Entity\Module;
use App\Entity\Onglet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
class OngletCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Onglet::class;
    }

    public function configureFields(string $pageName): iterable
    {


        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('nom', 'Interface_Name');
        yield TextField::new('description', 'Description');
        yield AssociationField::new('module', 'Module');

    }
}