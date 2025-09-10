<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les Articles du blog
function accueil() {
    $Articles = getArticles();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un Article
function Article($id, $erreur) {
    $Article = getArticle($id);
    $commentaires = getCommentaires($id);
    require 'Vue/vueArticle.php';
}

// Ajoute un commentaire à un Article
function commentaire($commentaire) {
    
        // Ajouter le commentaire à l'aide du modèle
        setCommentaire($commentaire);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=Article&id=' . $commentaire['Article_id']);
    
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $commentaire = getCommentaire($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'Article associé
    $commentaire = getCommentaire($id);
    // Supprimer le commentaire à l'aide du modèle
    deleteCommentaire($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=Article&id=' . $commentaire['Article_id']);
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}