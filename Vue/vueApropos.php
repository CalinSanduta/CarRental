<?php $this->titre = 'À propos de CarRental'; ?>

<article>
    <header>
        <h1>À propos</h1>
    </header>

    <ul>
        <li>Projet : CarRental</li>
        <li>420-XXX Développement d’applications Web</li>
        <li>Automne 2025, Collège Montmorency</li>
    </ul>

    <h3>CarRental – Application de location de voitures</h3>
    <ul>
        <li>L’application <b>CarRental</b> permet de gérer la location de véhicules :</li>
        <ul>
            <li>Affichage des voitures disponibles (modèle, année, prix par jour).</li>
            <li>Ajout, modification et suppression des voitures par un administrateur.</li>
        </ul>

        <li>La page d’accueil présente la liste des voitures disponibles avec leur prix et leur description :</li>
        <ul>
            <li>Un client peut sélectionner une voiture et voir ses détails (année, description, tarif).</li>
        </ul>

        <li>Un utilisateur peut effectuer une réservation :</li>
        <ul>
            <li>Saisie des informations client (nom, courriel, téléphone).</li>
            <li>Sélection des dates de début et de fin de location.</li>
            <li>Validation et enregistrement de la réservation dans la base de données.</li>
        </ul>

        <li>Les administrateurs ont la possibilité de :</li>
        <ul>
            <li>Ajouter une nouvelle voiture à louer.</li>
            <li>Mettre à jour les informations d’un véhicule.</li>
            <li>Supprimer une voiture du catalogue.</li>
        </ul>

        <li>Les clients ont la possibilité de :</li>
        <ul>
            <li>Consulter la liste des voitures.</li>
            <li>Voir les détails d’une voiture spécifique.</li>
            <li>Réserver un véhicule en ligne.</li>
        </ul>
    </ul>

    <h4>Structure de la base de données :</h4>
    <ul>
        <li><b>Voiture</b> : id, modèle, année, description, prix_jour</li>
        <li><b>Client</b> : id, nom, courriel, téléphone</li>
        <li><b>Réservation</b> : id, id_client, id_voiture, date_debut, date_fin</li>
    </ul>

</article>
