<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Avis extends Modele {

    // Renvoie la liste des avis associés à un voitures
    public function getAvis($idVoiture = NULL) {
        if ($idVoiture == NULL) {
            $sql = 'select * from avis';
            $avis = $this->executerRequete($sql);
        } else {
            $sql = 'select * from avis'
                    . ' where voiture_id = ?';
            $avis = $this->executerRequete($sql, [$idVoiture]);
        }
        return $avis;
    }

// Renvoie un avis spécifique
    public function getUnAvis($id) {
        $sql = 'select * from avis'
                . ' where id = ?';
        $avis = $this->executerRequete($sql, [$id]);
        if ($avis->rowCount() == 1) {
            return $avis->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun avis ne correspond à l'identifiant '$id'");
        }
    }

// Efface un avis
    public function deleteAvis($id) {
        $sql = 'UPDATE avis'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un avis
    public function restoreAvis($id) {
        $sql = 'UPDATE avis'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un avis associés à une voiture
    public function setAvis($avis) {
        $sql = 'INSERT INTO avis (voiture_id, utilisateur_id, date, commentaire) VALUES(?, ?, CURDATE(), ?)';
        $result = $this->executerRequete($sql, [$avis['voiture_id'], $avis['utilisateur_id'], $avis['commentaire']]);
        return $result;
    }

}
