<?php

require 'Modele.php';

try {
    if (isset($_POST['article_id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_POST['article_id']);
        if ($id != 0) {
            // vérifier si l'article existe;
            $article = getArticle($id);
            // Récupérer les données du formulaire
            $commentaire = $_POST;
            // Ajuster la valeur de la case à cocher
            $commentaire['prive'] = (isset($_POST['prive'])) ? 1 : 0;
            // AJouter le commentaire à l'aide du modèle
            setCommentaire($commentaire);
            //Recharger la page pour mettre à jour la liste des commentaires associés
            header('Location: article.php?id=' . $id);
        } else
            throw new Exception("Identifiant d'article incorrect");
    } else
        throw new Exception("Aucun identifiant d'article");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
