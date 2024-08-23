<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Module;
use App\Entity\Onglet;
use App\Entity\Action;
use App\Entity\Data;
use App\Entity\Incident;
use App\Entity\User;


class DashboardController extends AbstractDashboardController
{



    public function index(): Response
    {   $username = $this->getUsername();
        return $this->render('bundles/EasyAdminBundle/page/dashboard.html.twig', [
            'username' => $username,

        ]);

    }
    private function getUsername(): string
    {
        $user = $this->getUser();
        return $user ? $user->getUsername() : '';
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ORHBM');
    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUserIdentifier())
            ->setGravatarEmail($user->getEmail())
            //   ->setAvatarUrl('https://www.clipartmax.com/png/full/405-4050774_avatar-icon-flat-icon-shop-download-free-icons-for-avatar-icon-flat.png')
            ->displayUserAvatar(true);
    }



    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('build/css/admin.css');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Acceuil', 'fas fa-home', 'home')
            ->setCssClass('menu-item menu-item-home');
        yield MenuItem::linkToCrud('Modules', 'fas fa-cubes', Module::class)
            ->setCssClass('menu-item menu-item-modules');
        yield MenuItem::linkToCrud('Interfaces', 'fas fa-th-large', Onglet::class)
            ->setCssClass('menu-item menu-item-interfaces');
        yield MenuItem::linkToCrud('Fonctionnalites', 'fas fa-tasks', Action::class)
            ->setCssClass('menu-item menu-item-fonctionnalites');
        yield MenuItem::linkToCrud('Incidents', 'fas fa-exclamation-triangle', Incident::class)
            ->setCssClass('menu-item menu-item-incidents');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class)
            ->setCssClass('menu-item menu-item-utilisateurs');
    }
}
