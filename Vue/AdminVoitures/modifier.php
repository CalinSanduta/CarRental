<?php $this->titre = "CarRental - " . $voiture['titre']; ?>

<header>
    <h1 id="titreReponses">Modifier une voiture de l'utilisateur 1 :</h1>
</header>
<form action="index.php?action=miseAJourVoiture" method="post">
    <h2>Modifier une voiture</h2>
    <p>
        <label for="modele">Modèle</label> : <input type="text" name="modele" id="modele" value="<?= $voiture['modele'] ?>" /> <br />
        <label for="annee">Année</label> :  <input type="text" name="annee" id="annee" value="<?= $voiture['annee'] ?>" /><br />
        <label for="prix_jour">Prix/jour</label> : <input type="text" name="prix_jour" id="prix_jour" value="<?= $voiture['prix_jour'] ?>" /> <br />
        <label for="description">Description de la voiture</label> :  <textarea name="description" id="description" ><?= $voiture['description'] ?></textarea><br />
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="hidden" name="id" value="<?= $voiture['id'] ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="index.php">
    <input type="submit" value="Annuler" />
</form>

