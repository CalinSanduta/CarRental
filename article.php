<?php

require 'Modele.php';

try {
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $article = getArticle($id);
            $commentaires = getCommentaires($id);
            require 'vueArticle.php';
        } else
            throw new Exception("Identifiant d'article incorrect");
    } else
        throw new Exception("Aucun identifiant d'article");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
