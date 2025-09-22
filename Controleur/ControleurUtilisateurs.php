<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

/**
 * Contrôleur gérant la connexion au site
 *
 * @author Baptiste Pesquet
 */
class ControleurUtilisateurs extends Controleur {

    private $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['erreur' => $erreur]);
    }

    public function connecter() {
    // On vérifie que les deux champs attendus sont présents
    if ($this->requete->existeParametre('email') && $this->requete->existeParametre('mot_de_passe')) {
        $email = $this->requete->getParametre('email');
        $mdp   = $this->requete->getParametre('mot_de_passe');

        // Récupérer l'utilisateur (ou false si introuvable)
        $utilisateur = $this->utilisateur->getUtilisateurParIdentifiants($email, $mdp);

        if ($utilisateur) {
            // Sauvegarde en session
            $this->requete->getSession()->setAttribut('utilisateur', $utilisateur);
            if ($this->requete->getSession()->existeAttribut('erreur')) {
                $this->requete->getSession()->setAttribut('erreur', '');
            }
            $this->rediriger('AdminVoitures');
        } else {
            $this->requete->getSession()->setAttribut('erreur', 'mdp');
            $this->rediriger('Utilisateurs');
        }
    } else {
        throw new Exception("Action impossible : email ou mot de passe non défini");
    }
    }


    public function deconnecter() {
        $this->requete->getSession()->detruire();
        $this->rediriger("");
    }

}
