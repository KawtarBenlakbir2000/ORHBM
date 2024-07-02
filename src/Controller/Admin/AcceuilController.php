<?php
// src/Controller/Admin/CustomController.php

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

    /**
     * @Route("/admin/last-updated", name="admin_last_updated", methods={"GET"})
     */
    public function getLastUpdated(): JsonResponse
    {
        $lastUpdated = $this->session->get('last_updated');

        if (!$lastUpdated) {
            $lastUpdated = new \DateTime('now');
            $this->session->set('last_updated', $lastUpdated);
        }

        return $this->json([
            'last_updated' => $lastUpdated->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * @Route("/admin/refresh-data", name="admin_refresh_data", methods={"POST"})
     */
    public function refreshData(Request $request): JsonResponse
    {
        // Vérifiez le token CSRF pour la sécurité
        $csrfToken = $request->headers->get('X-CSRF-TOKEN');
        if (!$this->csrfTokenManager->isTokenValid(new CsrfToken('refresh_data', $csrfToken))) {
            return new JsonResponse(['success' => false, 'message' => 'Invalid CSRF token'], 400);
        }

        // Exécutez le script Python
        $process = new Process(['python', 'C:\\Users\\kbenlakbir\\collecteData.py']); // Modifiez le chemin vers votre script
        $process->run();

        // Vérifiez si le script a été exécuté avec succès
        if (!$process->isSuccessful()) {
            return new JsonResponse(['success' => false, 'message' => "Erreur lors de l'exécution du script Python"]);
        }

        // Mettre à jour la date de dernière mise à jour après le rafraîchissement des données
        $lastUpdated = new \DateTime('now');
        $this->session->set('last_updated', $lastUpdated);

        return new JsonResponse(['success' => true, 'message' => 'Les données ont été bien rafraîchies', 'last_updated' => $lastUpdated->format('Y-m-d H:i:s')]);
    }
}
