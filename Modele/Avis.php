<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Avis extends Modele {

    // Renvoie la liste des avis associés à un voiture
    public function getAvis($idVoiture) {
        $sql = 'select * from avis where voiture_id = ? ORDER by id DESC';
        $avis = $this->executerRequete($sql, [$idVoiture]);
        return $avis;
    }

// Renvoie un avis spécifique
    public function getUnAvis($id) {
        $sql = 'select * from avis where id = ?';
        $avis = $this->executerRequete($sql, [$id]);
        if ($avis->rowCount() == 1) {
            return $avis->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun avis ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un avis
    public function deleteAvis($id) {
        $sql = 'DELETE FROM avis'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un avis associés à un voiture
    public function setAvis($avis) {
        $sql = 'INSERT INTO avis (voiture_id, utilisateur_id, date, commentaire) VALUES(?, ?, CURDATE(), ?)';
        $result = $this->executerRequete($sql, [$avis['voiture_id'], $avis['utilisateur_id'], $avis['commentaire']]);
        return $result;
    }

}
