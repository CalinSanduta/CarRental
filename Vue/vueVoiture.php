<?php $this->titre = "Location de voitures - " . $voiture['modele']; ?>

<article>
    <header>
        <h1 class="titreVoiture"><?= $voiture['modele'] ?> (<?= $voiture['annee'] ?>)</h1>
        <p><strong>Prix par jour :</strong> <?= $voiture['prix_jour'] ?> $</p>
    </header>
    <p><?= $voiture['description'] ?></p>
</article>

<hr />
<header>
    <h1 id="titreReponses">Avis sur <?= $voiture['modele'] ?> :</h1>
</header>
<?php foreach ($avis as $unAvis): ?>
<p>
    <a href="index.php?action=confirmer&id=<?= $unAvis['id'] ?>">[Supprimer]</a>
    <?= $unAvis['date'] ?> — utilisateur #<?= $unAvis['utilisateur_id'] ?><br />
    <?= $unAvis['commentaire'] ?>
</p>
<?php endforeach; ?>

<form action="index.php?action=avis" method="post">
    <h2>Ajouter un avis</h2>
    <p>
        <label for="utilisateur_id">Utilisateur #</label>
        <input type="number" name="utilisateur_id" id="utilisateur_id" required />

        <br />
        <label for="commentaire">Avis</label><br />
        <textarea name="commentaire" id="commentaire" rows="4" cols="50" required>Écrivez votre avis ici</textarea><br />

        <input type="hidden" name="voiture_id" value="<?= $voiture['id'] ?>" />
        <input type="submit" value="Envoyer" />
    </p>
</form>
