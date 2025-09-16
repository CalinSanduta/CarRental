<?php

require_once 'Modele/Avis.php';
require_once 'Vue/Vue.php';

class ControleurAvis {

    private $avis;

    public function __construct() {
        $this->avis = new Avis();
    }

// Ajoute un avis à un voiture
    public function avis($avis) {
        $validation_courriel = filter_var($avis['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            $_SESSION['h204a4message'] = "Ajouter un avis n'est pas permis en démonstration";
            // Ajouter le avis à l'aide du modèle
            $this->avis->setAvis($avis);
            //Recharger la page pour mettre à jour la liste des avis associés
            header('Location: index.php?action=voiture&id=' . $avis['voiture_id']);
        } else {
            //Recharger la page avec une erreur près du courriel
            header('Location: index.php?action=voiture&id=' . $avis['voiture_id'] . '&erreur=courriel');
        }
    }

// Confirmer la suppression d'un avis
    public function confirmer($id) {
        // Lire le avis à l'aide du modèle
        $avis = $this->avis->getAvis($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('avis' => $avis));
    }

// Supprimer un avis
    public function supprimer($id) {
        // Lire le avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getAvis($id);
        $_SESSION['h204a4message'] = "Supprimer un avis n'est pas permis en démonstration";
        // Supprimer le avis à l'aide du modèle
        $this->avis->deleteAvis($id);
        //Recharger la page pour mettre à jour la liste des avis associés
        header('Location: index.php?action=voiture&id=' . $avis['voiture_id']);
    }

}
