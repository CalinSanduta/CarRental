<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=blogue_v0_2_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les Articles, triés par identifiant décroissant
function getArticles() {
    $bdd = getBdd();
    $Articles = $bdd->query('select * from Articles'
            . ' order by ID desc');
    return $Articles;
}

// Renvoie les informations sur un Article
function getArticle($idArticle) {
    $bdd = getBdd();
    $Article = $bdd->prepare('select * from Articles'
            . ' where ID=?');
    $Article->execute(array($idArticle));
    if ($Article->rowCount() == 1)
        return $Article->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun Article ne correspond à l'identifiant '$idArticle'");
}

// Renvoie la liste des commentaires associés à un Article
function getCommentaires($idArticle) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select * from Commentaires'
            . ' where Article_id = ?');
    $commentaires->execute(array($idArticle));
    return $commentaires;
}

// Renvoie un commentaire spécifique
function getCommentaire($id) {
    $bdd = getBdd();
    $commentaire = $bdd->prepare('select * from Commentaires'
            . ' where id = ?');
    $commentaire->execute(array($id));
    if ($commentaire->rowCount() == 1)
        return $commentaire->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
    return $commentaire;
}

// Ajoute un commentaire associés à un Article
function setCommentaire($commentaire) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('INSERT INTO commentaires (Article_id, date, auteur, titre, texte, prive) VALUES(?, NOW(), ?, ?, ?, ?)');
    $commentaires->execute(array($commentaire['Article_id'], $commentaire['auteur'], $commentaire['titre'], $commentaire['texte'], $commentaire['prive']));
    return $commentaires;
}

// Supprime un commentaire
function deleteCommentaire($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM Commentaires'
            . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}
