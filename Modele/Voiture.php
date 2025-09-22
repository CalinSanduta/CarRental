<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux voitures 
 * 
 * @author André Pilon
 */
class Voiture extends Modele {

// Renvoie la liste de tous les voitures, triés par identifiant décroissant
    public function getVoitures() {
        $sql = 'select * from voitures'
                . ' order by ID desc';
        $voitures = $this->executerRequete($sql);
        return $voitures;
    }

// Renvoie la liste de tous les voitures, triés par identifiant décroissant
    public function setVoiture($voiture) {
        $sql = 'INSERT INTO voitures (modele, annee, description, prix_jour) VALUES(?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$voiture['modele'], $voiture['annee'], $voiture['description'], $voiture['prix_jour']]);
        return $result;
    }

// Renvoie les informations sur un voiture
    function getVoiture($idVoiture) {
        $sql = 'select * from voitures'
                . ' where ID=?';
        $voiture = $this->executerRequete($sql, [$idVoiture]);
        if ($voiture->rowCount() == 1) {
            return $voiture->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune voiture ne correspond à l'identifiant '$idVoiture'");
        }
    }
// Met à jour un voiture
    public function updateVoiture($voiture) {
        $sql = 'UPDATE voitures'
                . ' SET modele = ?, annee = ?, description = ?, prix_jour = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$voiture['modele'], $voiture['annee'], $voiture['description'], $voiture['prix_jour'], $voiture['id']]);
        return $result;
    }
    
}
