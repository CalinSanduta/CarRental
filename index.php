<?php
require 'Modele.php';
try {
    $articles = getArticles();
    require 'vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
