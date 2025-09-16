<?php

require_once 'Modele/Voiture.php';
require_once 'Modele/Avis.php';
require_once 'Vue/Vue.php';

class ControleurVoiture {

    private $voiture;
    private $avis;

    public function __construct() {
        $this->voiture = new Voiture();
        $this->avis = new Avis();
    }

// Affiche la liste de tous les voitures du blog
    public function voitures() {
        $voitures = $this->voiture->getVoitures();
        $vue = new Vue("Voitures");
        $vue->generer(['Voitures' => $Voitures]);
    }

// Affiche les détails sur une voitures
    public function voiture($idVoiture, $erreur) {
        $voiture = $this->voiture->getVoiture($idVoiture);
        $avis = $this->avis->getAvis($idVoiture);
        $vue = new Vue("Voiture");
        $vue->generer(['voiture' => $voiture, 'avis' => $avis, 'erreur' => $erreur]);
    }

    public function nouvelVoiture() {
        $vue = new Vue("Ajouter");
        $vue->generer();
    }

// Enregistre la nouvelle voiture et retourne à la liste des voitures
    public function ajouter($voiture) {
        $this->voiture->setVoiture($voiture);
        $this->voitures();
    }

// Modifier une voiture existante  
    public function modifierVoiture($id) {
        $voiture = $this->voiture->getVoiture($id);
        $vue = new Vue("ModifierVoiture");
        $vue->generer(['voiture' => $voiture]);
    }

// Enregistre la voiture modifié et retourne à la liste des voitures
    public function miseAJourVoiture($voiture) {
        $this->voiture->updateArticle($voiture);
        $this->voitures();
    }

}
