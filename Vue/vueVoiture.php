<?php $titre = "Location de voitures - " . $Voiture['titre']; ?>

<?php ob_start(); ?>
<Voiture>
    <header>
        <h1 class="titreVoiture"><?= $Voiture['titre'] ?></h1>
        <time><?= $Voiture['date'] ?></time>, par utilisateur #<?= $Voiture['utilisateur_id'] ?>
        <h3 class=""><?= $Voiture['sous_titre'] ?></h3>
    </header>
    <p><?= $Voiture['texte'] ?></p>
    <p><?= $Voiture['type'] ?></p>
</Voiture>
<hr />
<header>
    <h1 id="titreReponses">Avis sur <?= $Voiture['titre'] ?> :</h1>
</header>
<?php foreach ($avis as $unAvis): ?>
<p>
    <a href="index.php?action=confirmer&id=<?= $unAvis['id'] ?>">
        [Supprimer]
    </a>
    <?= $unAvis['date'] ?>, <?= $unAvis['auteur'] ?> dit : (privé? <?= $unAvis['prive'] ?>)<br />
    <strong><?= $unAvis['titre'] ?></strong><br />
    <?= $unAvis['texte'] ?>
</p>
<?php endforeach; ?>

<form action="index.php?action=avis" method="post">
    <h2>Ajouter un avis</h2>
    <p>
        <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" />
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?>
        <br />
        <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Avis</label> : <textarea type="text" name="texte"
            id="texte">Écrivez votre avis ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="Voiture_id" value="<?= $Voiture['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
