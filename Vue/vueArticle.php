<?php $titre = "Le Blogue du prof - " . $Article['titre']; ?>

<?php ob_start(); ?>
<Article>
    <header>
        <h1 class="titreArticle"><?= $Article['titre'] ?></h1>
        <time><?= $Article['date'] ?></time>, par utilisateur #<?= $Article['utilisateur_id'] ?>
        <h3 class=""><?= $Article['sous_titre'] ?></h3>
    </header>
    <p><?= $Article['texte'] ?></p>
    <p><?= $Article['type'] ?></p>
</Article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $Article['titre'] ?> :</h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
<p>
    <a href="index.php?action=confirmer&id=<?= $commentaire['id'] ?>">
        [Supprimer]
    </a>
    <?= $commentaire['date'] ?>, <?= $commentaire['auteur'] ?> dit : (privé? <?= $commentaire['prive'] ?>)<br />
    <strong><?= $commentaire['titre'] ?></strong><br />
    <?= $commentaire['texte'] ?>
</p>
<?php endforeach; ?>

<form action="index.php?action=commentaire" method="post">
    <h2>Ajouter un commentaire</h2>
    <p>
        <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" />
        <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?>
        <br />
        <label for="texte">Titre</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Commentaire</label> : <textarea type="text" name="texte"
            id="texte">Écrivez votre commentaire ici</textarea><br />
        <label for="prive">Privé?</label><input type="checkbox" name="prive" />
        <input type="hidden" name="Article_id" value="<?= $Article['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>