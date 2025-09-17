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

    // Affiche la liste de toutes les voitures
    public function voitures() {
        // CHANGÉ : matérialiser en tableau
        $voitures = $this->voiture->getVoitures()->fetchAll(PDO::FETCH_ASSOC);
        $vue = new Vue("Voitures");
        $vue->generer(['voitures' => $voitures]);
    }

    // Affiche les détails sur une voiture
    public function voiture($idVoiture, $erreur) {
        // CHANGÉ : getVoiture() renvoie déjà une ligne (fetch()), donc pas de fetchAll ici
        $voiture = $this->voiture->getVoiture($idVoiture);
        // CHANGÉ : la liste des avis, oui → fetchAll
        $avis = $this->avis->getAvis($idVoiture)->fetchAll(PDO::FETCH_ASSOC);
        $vue = new Vue("Voiture");
        $vue->generer(['voiture' => $voiture, 'avis' => $avis, 'erreur' => $erreur]);
    }

    public function nouvelVoiture() {
        $vue = new Vue("Ajouter");
        $vue->generer();
    }

    // Enregistre la nouvelle voiture et retourne à la liste
    public function ajouter($voiture) {
        $this->voiture->setVoiture($voiture);
        $this->voitures();
    }

    // Modifier une voiture existante
    public function modifierVoiture($id) {
        $voiture = $this->voiture->getVoiture($id); // renvoie déjà une ligne
        $vue = new Vue("ModifierVoiture");
        $vue->generer(['voiture' => $voiture]);
    }

    // Enregistre la voiture modifiée et retourne à la liste
    public function miseAJourVoiture($voiture) {
        $this->voiture->updateVoiture($voiture);
        $this->voitures();
    }
    
}
