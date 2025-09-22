<?php

require_once 'Modele/Avis.php';
require_once 'Framework/Vue.php';

class ControleurAvis extends Controleur {

    private $avis;

    public function __construct() {
        $this->avis = new Avis();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les avis
    public function index() {
        $avis = $this->avis->getAvis();
        $this->genererVue(['avis' => $avis]);
    }

// Ajoute un avis à une voiture
    public function ajouter() {
        $avis['voiture_id'] = $this->requete->getParametreId("voiture_id");
        $avis['auteur'] = $this->requete->getParametre('auteur');
        $validation_courriel = filter_var($avis['auteur'], FILTER_VALIDATE_EMAIL);
        if ($validation_courriel) {
            // Éliminer un code d'erreur éventuel
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getsession()->setAttribut('erreur', '');
            }
            $avis['titre'] = $this->requete->getParametre('titre');
            $avis['texte'] = $this->requete->getParametre('texte');
            // Ajuster la valeur de la case à cocher
            $avis['prive'] = $this->requete->existeParametre('prive') ? 1 : 0;
            // Ajouter le avis à l'aide du modèle
            $this->avis->setAvis($avis);
        } else {
            //Recharger la page avec une erreur près du courriel
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
        }
        //Recharger la page pour mettre à jour la liste des avis associés ou afficher une erreur
        $this->rediriger('Voitures', 'lire/' . $avis['voiture_id']);
    }

// Confirmer la suppression d'un avis
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis à l'aide du modèle
        $avis = $this->avis->getAvis($id);
        $this->genererVue(['avis' => $avis]);
    }

// Supprimer un avis
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getAvis($id);
        // Supprimer le avis à l'aide du modèle
        $this->avis->deleteAvis($id);
        //Recharger la page pour mettre à jour la liste des avis associés
        $this->rediriger('Voitures', 'voitures/' . $avis['voitures_id']);
    }

    // Rétablir un avis
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getAvis($id);
        // Supprimer le avis à l'aide du modèle
        $this->avis->restoreAvis($id);
        //Recharger la page pour mettre à jour la liste des avis associés
        $this->rediriger('Voitures', 'voiture/' . $avis['voiture_id']);
    }

}
