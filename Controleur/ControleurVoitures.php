<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Voiture.php';
require_once 'Modele/Avis.php';

class ControleurVoitures extends Controleur {

    private $voiture;
    private $avis;

    public function __construct() {
        $this->voiture = new Voiture();
        $this->avis = new Avis();
    }

// Affiche la liste de tous les voitures du blog
    public function index() {
        $voitures = $this->voiture->getVoitures();
        $this->genererVue(['voitures' => $voitures]);
    }

// Affiche les détails sur un voiture
    public function lire() {
        $idVoiture = $this->requete->getParametreId("id");
        $voiture = $this->voiture->getVoiture($idVoiture);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $avis = $this->avis->getAvis($idVoiture);
        $this->genererVue(['voiture' => $voiture, 'avis' => $avis, 'erreur' => $erreur]);
    }
}

