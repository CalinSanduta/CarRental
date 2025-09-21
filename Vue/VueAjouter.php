<?php $this->titre = "CarRental - Ajouter une voiture" . (isset($voiture['titre']) ? $voiture['titre'] : ''); ?>

<header>
    <h1 id="titreReponses">Ajouter une voiture de l'utilisateur 1 :</h1>
</header>
<form action="index.php?action=ajouter" method="post">
    <h2>Ajouter une voiture</h2>
    <p>
        <label for="modele">Modèle</label> : <input type="text" name="modele" id="modele" /> <br />
        <label for="annee">Année</label> :  <input type="text" name="annee" id="annee" /><br />
        <label for="prix_jour">Prix/jour</label> : <input type="text" name="prix_jour" id="prix_jour" /> <br />
        <label for="description">Description de la voiture</label> :  <textarea type="text" name="description" id="description" >Courte description ici</textarea><br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

