<?php $titre = "Supprimer - " . $avis['titre']; ?>
<?php ob_start(); ?>
<Voiture>
    <header>
        <p><h1>
            Supprimer cet avis ?
        </h1>
        <?= $avis['date'] ?>, <?= $avis['auteur'] ?> dit : (privé? <?= $avis['prive'] ?>)<br/>
        <strong><?= $avis['titre'] ?></strong><br/>
        <?= $avis['texte'] ?>
        </p>
    </header>
</Voiture>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $avis['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="Voiture" />
    <input type="hidden" name="id" value="<?= $avis['Voiture_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
