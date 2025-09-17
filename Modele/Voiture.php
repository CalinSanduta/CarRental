<?php

require_once 'Modele/Modele.php';

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

// Renvoie les informations sur un voiture
    function getVoiture($idVoiture) {
        $sql = 'select * from voitures'
                . ' where ID=?';
        $voiture = $this->executerRequete($sql, [(int)$idVoiture]);
        if ($voiture->rowCount() == 1) {
            return $voiture->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune voiture ne correspond à l'identifiant '$idVoiture'");
        }
    }
 // Ajout d'une nouvelle voiture
    public function setVoiture($voiture) {
        $sql = 'INSERT INTO voitures (modele, annee, description, prix_jour) VALUES(?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$voiture['modele'], (string)$voiture['annee'], $voiture['description'], (float)$voiture['prix_jour']]);
        return $result;
    }
// Met à jour une voiture
    public function updateVoiture($voiture) {
        $sql = 'UPDATE voitures'
                . ' SET modele = ?, annee = ?, description = ?, prix_jour = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$voiture['modele'], (string)$voiture['annee'], $voiture['description'], (float)$voiture['prix_jour'], (int)$voiture['id']]);
        return $result;
    }
    
}