<?php

namespace App\Controller;

use App\Entity\Incident;
use App\Entity\Module;
use App\Entity\Onglet;
use App\Repository\IncidentRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    private $authChecker;

    public function __construct(AuthorizationCheckerInterface $authChecker)
    {
        $this->authChecker = $authChecker;
    }

    public function index(): Response
    {
        $isAdmin = $this->authChecker->isGranted('ROLE_ADMIN');
        $username = $this->getUsername();
        $modules = $this->getDoctrine()->getRepository(Module::class)->findAll();
        $incidents = $this->getDoctrine()->getRepository(Incident::class)->findBy([], ['id' => 'DESC'], 5);
        $INC= $this->getDoctrine()->getRepository(Incident::class)->findAll();
        $totalIncidents = count($INC);
        return $this->render('home/index.html.twig', [
            'username' => $username,
            'modules' => $modules,
            'incident'=>$incidents,
            'totalIncidents' => $totalIncidents,
            'isAdmin'=>$isAdmin
        ]);
    }

    public function incident(Request $request, IncidentRepository $incidentRepository): Response
    {
        $isAdmin = $this->authChecker->isGranted('ROLE_ADMIN');
        $username = $this->getUsername();
        $incidents = $incidentRepository->findAll();
        $name = $request->query->get('name');
        $startDate = $request->query->get('startDate');
        $endDate = $request->query->get('endDate');

        $incidentF = $incidentRepository->findByFilters($name, $startDate ,$endDate);

        return $this->render('home/gestionIncident.html.twig', [
            'username' => $username,
            'incidents' => $incidents,
            'incidentF'=>$incidentF,
            'name' => $name,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'isAdmin'=>$isAdmin        ]);
    }

    public function detailsInterface(): Response
    {
        $isAdmin = $this->authChecker->isGranted('ROLE_ADMIN');
        $username = $this->getUsername();
        $onglets = $this->getDoctrine()->getRepository(Onglet::class)->findAll();
        $module = $this->getDoctrine()->getRepository(Module::class)->findAll();


        return $this->render('home\detailsInterface.html.twig', [
            'username' => $username,
            'onglets' => $onglets,
            'isAdmin'=>$isAdmin,
            'modules'=>$module
        ]);
    }

    private function getUsername(): string
    {
        $user = $this->getUser();
        return $user ? $user->getUsername() : '';
    }



}
