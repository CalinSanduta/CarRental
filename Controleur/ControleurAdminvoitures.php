<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Voiture.php';
require_once 'Modele/Avis.php';

class ControleurAdminVoitures extends ControleurAdmin {

    private $voiture;
    private $avis;

    public function __construct() {
        $this->voiture = new Voiture();
        $this->avis = new Avis();
    }

    public function index() {
        $voitures = $this->voiture->getVoitures()->fetchAll(PDO::FETCH_ASSOC);
        $this->genererVue(['voitures' => $voitures]);
    }
// Affiche les détails sur une voiture
    public function lire() {
        $idVoiture = $this->requete->getParametreId("id");
        $voiture = $this->voiture->getVoiture($idVoiture);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getSession()->getAttribut("erreur") : '';
        $avis = $this->avis->getAvis($idVoiture)->fetchAll(PDO::FETCH_ASSOC);
        $this->genererVue(['voiture' => $voiture, 'avis' => $avis, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel voiture et retourne à la liste des voitures
    public function nouveau() {
        $voiture['modele'] = $this->requete->getParametre('modele');
        $voiture['annee'] = $this->requete->getParametre('annee');
        $voiture['description'] = $this->requete->getParametre('description');
        $voiture['prix_jour'] = $this->requete->getParametre('prix_jour');
        $this->voiture->setVoiture($voiture);
        $this->executerAction('index');
    }

// Modifier une voiture existante   
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $voiture = $this->voiture->getVoiture($id);
        $this->genererVue(['voiture' => $voiture]);
    }

// Enregistre la voiture modifiée et retourne à la liste des voitures
    public function miseAJourVoiture() {
        $voiture['id'] = $this->requete->getParametreId('id');
        $voiture['modele'] = $this->requete->getParametre('modele');
        $voiture['annee'] = $this->requete->getParametre('annee');
        $voiture['description'] = $this->requete->getParametre('description');
        $voiture['prix_jour'] = $this->requete->getParametre('prix_jour');
        $this->voiture->updateVoiture($voiture);
        $this->executerAction('index');
    }

}
