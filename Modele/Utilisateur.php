<?php

require_once 'Framework/Modele.php';

/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur extends Modele {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select id from utilisateurs where identifiant = ? and mot_de_passe = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    
    public function getUtilisateurParIdentifiants(string $email, string $mdp) {
    $sql = 'SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?';
    $stmt = $this->executerRequete($sql, [$email, $mdp]);
    return $stmt->fetch(); // false si aucun utilisateur
}


}

