<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // FormField::addPanel('Identification'),
            //FormField::addTab('First Tab'),
            IdField::new('id')->onlyOnIndex()->setColumns(6),
            TextField::new('username', 'Nom Utilisateur')->setColumns(6),
            EmailField::new('email', 'E-Mail')->setColumns(6),
            TextField::new('password', 'Mot de Passe')->setFormType(PasswordType::class)->onlyWhenCreating()->setColumns(6),
           //TextEditorField::new('password', 'Passe')->onlyOnIndex()->setColumns(6),
            ChoiceField::new('roles', 'Roles')->setChoices(['Admin' => 'ROLE_ADMIN', 'Equipe_support' => 'ROLE_Esupport'])->allowMultipleChoices()->setColumns(6),
            ChoiceField::new('locale', 'Langue')->setChoices(['🇫🇷 Français' => 'fr_FR', '🇬🇧 English' => 'en_EN'])->setColumns(6),
            BooleanField::new('is_verified', 'Verifié')->setColumns(6),


        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->hashPasswordIfPlain($entityInstance);

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->hashPasswordIfPlain($entityInstance);

        parent::updateEntity($entityManager, $entityInstance);
    }

    private function hashPasswordIfPlain($entityInstance)
    {
        // Vérifie si l'entité est de type User et si le mot de passe est en texte brut (non haché)
        if ($entityInstance instanceof User && $entityInstance->getPassword()) {
            $hashedPassword = $this->passwordEncoder->encodePassword($entityInstance, $entityInstance->getPassword());
            $entityInstance->setPassword($hashedPassword);
        }
    }
}
