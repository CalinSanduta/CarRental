<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Avis.php';
require_once 'Framework/Vue.php';

class ControleurAvis extends Controleur {

    private $avis;

    public function __construct() {
        $this->avis = new Avis();
    }

    public function index() {
        // Redirection vers la page d'accueil (liste des voitures)
        header('Location: index.php');
        exit;
    }

    // Ajoute un avis à une voiture
    public function avis($donnees) {
        // Valider les champs réellement envoyés par le formulaire
        if (!empty($donnees['voiture_id']) && !empty($donnees['utilisateur_id']) && trim($donnees['commentaire']) !== '') {
            try {
                $this->avis->setAvis($donnees);
                header('Location: index.php?action=voiture&id=' . intval($donnees['voiture_id']));
                exit;
            } catch (Exception $e) {
                // Rediriger vers la page voiture avec une erreur lisible
                $msg = urlencode($e->getMessage());
                header('Location: index.php?action=voiture&id=' . intval($donnees['voiture_id']) . '&erreur=' . $msg);
                exit;
            }
        } else {
            header('Location: index.php?action=voiture&id=' . intval($donnees['voiture_id'] ?? 0) . '&erreur=champs');
            exit;
        }
    }

    // Confirmer la suppression d'un avis
    public function confirmer($id) {
        // Lire l'avis à l'aide du modèle (un seul enregistrement)
        $avis = $this->avis->getUnAvis($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('avis' => $avis));
    }

    // Supprimer un avis
    public function supprimer($id) {
        // Lire l'avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getUnAvis($id);
        // Supprimer le avis à l'aide du modèle
        $this->avis->deleteAvis($id);
        // Recharger la page pour mettre à jour la liste des avis associés
        header('Location: index.php?action=voiture&id=' . intval($avis['voiture_id']));
        exit;
    }

}
