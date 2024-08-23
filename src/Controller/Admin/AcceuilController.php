<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Process\Process;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AcceuilController extends AbstractController
{
    private $csrfTokenManager;
    private $session;

    public function __construct(CsrfTokenManagerInterface $csrfTokenManager, SessionInterface $session)
    {
        $this->csrfTokenManager = $csrfTokenManager;
        $this->session = $session;
    }


    public function getLastUpdated(): JsonResponse
    {
        try {
            // Récupération de la dernière mise à jour depuis la session
            $lastUpdated = $this->session->get('last_updated');

            // Si la dernière mise à jour n'existe pas, on crée une nouvelle date
            if (!$lastUpdated || !$lastUpdated instanceof \DateTime) {
                $lastUpdated = new \DateTime('now');
                $this->session->set('last_updated', $lastUpdated);
            }

            // Retourne la réponse JSON avec la date formatée
            return $this->json([
                'last_updated' => $lastUpdated->format('Y-m-d H:i:s')
            ]);

        } catch (\Exception $e) {
            // Gestion des erreurs
            return $this->json(['error' => 'Une erreur est survenue lors de la récupération de la dernière mise à jour.'], 500);
        }

    }




    public function scheduleDailyTask(): JsonResponse
    {
        // Commande pour planifier le script Python à 8h chaque jour
        $output = shell_exec('echo "0 8 * * * /chemin/vers/python /chemin/vers/votre_script.py" | crontab -');

        if (!$output) {
            return new JsonResponse(['success' => false, 'message' => 'Erreur lors de la planification de la tâche']);
        }

        return new JsonResponse(['success' => true, 'message' => 'La tâche a été planifiée avec succès pour 8h chaque jour']);
    }
}
