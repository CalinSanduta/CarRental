<?php $this->titre = "Supprimer l'avis"; ?>

<article>
    <header>
        <h1>Supprimer cet avis ?</h1>
    </header>
    <p><strong>Date :</strong> <?= htmlspecialchars($avis['date']) ?><br />
       <strong>Utilisateur # :</strong> <?= htmlspecialchars($avis['utilisateur_id']) ?></p>
    <p><?= nl2br(htmlspecialchars($avis['avis'])) ?></p>

    <form action="index.php?action=supprimer" method="post">
        <input type="hidden" name="id" value="<?= intval($avis['id']) ?>" />
        <input type="submit" value="Oui, supprimer" />
    </form>
    <form action="index.php" method="get">
        <input type="hidden" name="action" value="voiture" />
        <input type="hidden" name="id" value="<?= intval($avis['voiture_id']) ?>" />
        <input type="submit" value="Annuler" />
    </form>
</article>
