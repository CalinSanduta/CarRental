<?php $this->titre = "CarRental - Ajouter une voiture"; ?>

<header>
  <h1 id="titreReponses">Ajouter une voiture :</h1>
</header>

<form method="post" action="Adminvoitures/nouveau">
  <h2>Ajouter une voiture</h2>
  <p>
    <label for="modele">Modèle</label> :
    <input type="text" name="modele" id="modele" required>

    <br>

    <label for="annee">Année</label> :
    <input type="number" name="annee" id="annee" required>

    <br>

    <label for="prix_jour">Prix/jour</label> :
    <input type="number" step="0.01" name="prix_jour" id="prix_jour" required>

    <br>

    <label for="description">Description de la voiture</label> :
    <textarea name="description" id="description" required>Courte description ici</textarea>

    <!-- Si ta colonne utilisateur_id est NOT NULL, il faut aussi l'insérer :
    <input type="hidden" name="utilisateur_id" value="1">
    -->

    <br>
    <button type="submit">Envoyer</button>
  </p>
</form>
