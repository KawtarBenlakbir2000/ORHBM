<?php

namespace App\Controller\Admin;

use App\Entity\Incident;
use App\Form\IncidentType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileField;
use Symfony\Component\HttpFoundation\File\UploadedFile;




class IncidentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Incident::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex()->setColumns(6),
            TextEditorField::new('description', 'Description')->setColumns(6),
            TextField::new('identifiant', 'Identifiant')->setColumns(6),
            ChoiceField::new('type', 'Type')->setChoices(['incident' => 'Incident', 'anomalie' => 'Anomalie'])->setColumns(6),
            AssociationField::new('onglet', 'Onglet'),
            DateField::new('date', 'Date')->setColumns(6)->setFormat('yyyy-MM-dd'),
            BooleanField::new('resolu', 'Resolu')->setColumns(6),
            ImageField::new('solution', 'Upload fichier')->setFormType(FileUploadType::class)->setUploadDir('public/uploads')->setColumns(6),
        ];
    }

}
