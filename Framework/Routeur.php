<?php

require_once 'Controleur/ControleurVoiture.php';
require_once 'Controleur/ControleurAvis.php'; 
// require_once 'Controleur/ControleurType.php';
require_once 'Framework/Vue.php';

class Routeur {

    private $ctrlVoiture;
    private $ctrlAvis;
    // private $ctrlType;

    public function __construct() {
        $this->ctrlVoiture = new ControleurVoiture();
        $this->ctrlAvis = new ControleurAvis(); 
        // $this->ctrlType = new ControleurType();
    }
    
    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                // À propos
                if ($_GET['action'] == 'apropos') {
                    $this->apropos();
                } else if ($_GET['action'] == 'voiture') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        $this->ctrlVoiture->voiture($id, $erreur);
                    } else
                        throw new Exception("Identifiant d'une voiture non valide");
                } else if ($_GET['action'] == 'avis') {
                    // Tester l'existence des paramètres requis
                    $voiture_id = intval($this->getParametre($_POST, 'voiture_id'));
                    if ($voiture_id != 0) {
                        $this->getParametre($_POST, 'utilisateur_id');
                        $this->getParametre($_POST, 'commentaire');
                        $this->ctrlAvis->avis($_POST);
                    } else
                        throw new Exception("Identifiant d'une voiture non valide");
                } else if ($_GET['action'] == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlAvis->confirmer($id);
                    } else
                        throw new Exception("Identifiant de avis non valide");
                } else if ($_GET['action'] == 'supprimer') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $this->ctrlAvis->supprimer($id);
                    } else
                        throw new Exception("Identifiant de avis non valide");
                } else if ($_GET['action'] == 'nouvelVoiture') {
                    $this->ctrlVoiture->nouvelVoiture();
                } else if ($_GET['action'] == 'ajouter') {
                    $this->getParametre($_POST, 'modele');
                    $this->getParametre($_POST, 'annee');
                    $this->getParametre($_POST, 'description');
                    $this->getParametre($_POST, 'prix_jour');
                    $this->ctrlVoiture->ajouter($_POST);

                } else if ($_GET['action'] == 'miseAJourVoiture') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $this->getParametre($_POST, 'modele');
                        $this->getParametre($_POST, 'annee');
                        $this->getParametre($_POST, 'description');
                        $this->getParametre($_POST, 'prix_jour');
                        $this->ctrlVoiture->miseAJourVoiture($_POST);
                    } else
                        throw new Exception("Identifiant de voiture non valide");
                } else if ($_GET['action'] == 'modifierVoiture') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlVoiture->modifierVoiture($id);
                    } else
                        throw new Exception("Identifiant de voiture non valide");

                } else {
                    throw new Exception("Action non valide");
                }
            } else {
                $this->ctrlVoiture->voitures();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une explication de l'application
    private function apropos() {
        $vue = new Vue("Apropos");
        $vue->generer();
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

}