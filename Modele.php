<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=blogue_v0_2_1;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les articles, triés par identifiant décroissant
function getArticles() {
    $bdd = getBdd();
    $articles = $bdd->query('select * from Articles'
            . ' order by ID desc');
    return $articles;
}

// Renvoie les informations sur un article
function getArticle($idArticle) {
    $bdd = getBdd();
    $article = $bdd->prepare('select * from Articles'
            . ' where ID=?');
    $article->execute(array($idArticle));
    if ($article->rowCount() == 1)
        return $article->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idArticle'");
}

// Renvoie la liste des commentaires associés à un article
function getCommentaires($idArticle) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select * from Commentaires'
            . ' where article_id = ?');
    $commentaires->execute(array($idArticle));
    return $commentaires;
}

// Ajoute un commentaire associés à un article
function setCommentaire($commentaire) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('INSERT INTO commentaires (article_id, date, auteur, titre, texte, prive) VALUES(?, NOW(), ?, ?, ?, ?)');
    $commentaires->execute(array($commentaire['article_id'], $commentaire['auteur'], $commentaire['titre'], $commentaire['texte'], $commentaire['prive']));
    return $commentaires;
}
