<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=locationvoitures;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de toutes les Voitures, triées par identifiant décroissant
function getVoitures() {
    $bdd = getBdd();
    $Voitures = $bdd->query('select * from Voitures'
            . ' order by ID desc');
    return $Voitures;
}

// Renvoie les informations sur une Voiture
function getVoiture($idVoiture) {
    $bdd = getBdd();
    $Voiture = $bdd->prepare('select * from Voitures'
            . ' where ID=?');
    $Voiture->execute(array($idVoiture));
    if ($Voiture->rowCount() == 1)
        return $Voiture->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune Voiture ne correspond à l'identifiant '$idVoiture'");
}

// Renvoie la liste des avis associés à une Voiture
function getAvis($idVoiture) {
    $bdd = getBdd();
    $avis = $bdd->prepare('select * from Avis'
            . ' where Voiture_id = ?');
    $avis->execute(array($idVoiture));
    return $avis;
}

// Renvoie un avis spécifique
function getUnAvis($id) {
    $bdd = getBdd();
    $avis = $bdd->prepare('select * from Avis'
            . ' where id = ?');
    $avis->execute(array($id));
    if ($avis->rowCount() == 1)
        return $avis->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun avis ne correspond à l'identifiant '$id'");
    return $avis;
}

// Ajoute un avis associé à une Voiture
function setAvis($avis) {
    $bdd = getBdd();
    $stmt = $bdd->prepare('INSERT INTO Avis (Voiture_id, date, auteur, titre, texte, prive) VALUES(?, NOW(), ?, ?, ?, ?)');
    $stmt->execute(array($avis['Voiture_id'], $avis['auteur'], $avis['titre'], $avis['texte'], $avis['prive']));
    return $stmt;
}

// Supprime un avis
function deleteAvis($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM Avis'
            . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}

?>
