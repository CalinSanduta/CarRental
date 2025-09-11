<?php

require 'Modele/Modele.php';

// Affiche la liste de toutes les Voitures
function accueil() {
    $Voitures = getVoitures();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur une Voiture
function Voiture($id, $erreur) {
    $Voiture = getVoiture($id);
    $avis = getAvis($id);
    require 'Vue/vueVoiture.php';
}

// Ajoute un avis à une Voiture
function avis($avis) {
    // Ajouter l'avis à l'aide du modèle
    setAvis($avis);
    //Recharger la page pour mettre à jour la liste des avis associés
    header('Location: index.php?action=Voiture&id=' . $avis['Voiture_id']);
}

// Confirmer la suppression d'un avis
function confirmer($id) {
    // Lire l'avis à l'aide du modèle
    $avis = getUnAvis($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un avis
function supprimer($id) {
    // Lire l'avis afin d'obtenir le id de la Voiture associée
    $avis = getUnAvis($id);
    // Supprimer l'avis à l'aide du modèle
    deleteAvis($id);
    //Recharger la page pour mettre à jour la liste des avis associés
    header('Location: index.php?action=Voiture&id=' . $avis['Voiture_id']);
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
