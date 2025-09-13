<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // Afficher un Voiture
        if ($_GET['action'] == 'Voiture') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    Voiture($id, $erreur);
                } else
                    throw new Exception("Identifiant de Voiture incorrect");
            } else
                throw new Exception("Aucun identifiant de Voiture");

            // Ajouter un avis
        } else if ($_GET['action'] == 'avis') {
            if (isset($_POST['Voiture_id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['Voiture_id']);
                if ($id != 0) {
                    // vérifier si la Voiture existe;
                    $Voiture = getVoiture($id);
                    // Récupérer les données du formulaire
                    $avis = $_POST;
                    // Ajuster la valeur de la case à cocher
                    $avis['prive'] = (isset($_POST['prive'])) ? 1 : 0;
                    //Réaliser l'action avis du contrôleur
                    avis($avis);
                } else
                    throw new Exception("Identifiant de Voiture incorrect");
            } else
                throw new Exception("Aucun identifiant de Voiture");

            // Confirmer la suppression
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant d'avis incorrect");
            } else
                throw new Exception("Aucun identifiant d'avis");

            // Supprimer un avis
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("Identifiant d'avis incorrect");
            } else
                throw new Exception("Aucun identifiant d'avis");
        } else {
            // Action mal définie
            throw new Exception("Action non valide");
        }

    // Action par défaut
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
