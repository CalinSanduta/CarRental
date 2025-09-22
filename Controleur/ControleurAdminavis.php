<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Avis.php';

class ControleurAdminAvis extends ControleurAdmin {

    private $avis;

    public function __construct() {
        $this->avis = new Avis();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les avis
    public function index() {
        $avis = [];
        $this->genererVue(['avis' => $avis]);
    }
  
// Confirmer la suppression d'un avis
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis à l'aide du modèle
        $avis = $this->avis->getUnAvis($id);
        $this->genererVue(['avis' => $avis]);
    }

// Supprimer un avis
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getUnAvis($id);
        // Supprimer le avis à l'aide du modèle
        $this->avis->deleteAvis($id);
        //Recharger la page pour mettre à jour la liste des avis associés
        $this->rediriger('Adminvoitures', 'lire/' . $avis['voiture_id']);
    }

    // Rétablir un avis
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le avis afin d'obtenir le id de la voiture associé
        $avis = $this->avis->getUnAvis($id);
        // Supprimer le avis à l'aide du modèle
        $this->avis->restoreAvis($id);
        //Recharger la page pour mettre à jour la liste des avis associés
        $this->rediriger('Adminvoitures', 'lire/' . $avis['voiture_id']);
    }

}
