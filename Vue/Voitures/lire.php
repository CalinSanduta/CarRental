<?php $this->titre = 'CarRental - ' . htmlspecialchars($voiture['modele']); ?>

<article>
    <header>
        <h1 class="titreVoiture">
            <?= htmlspecialchars($voiture['modele']) ?> (<?= htmlspecialchars($voiture['annee']) ?>)
        </h1>
    </header>

    <p><?= nl2br(htmlspecialchars($voiture['description'])) ?></p>
    <p><em><?= htmlspecialchars($voiture['prix_jour']) ?> $ / jour</em></p>
</article>

<hr />

<header>
    <h2>Avis pour <?= htmlspecialchars($voiture['modele']) ?></h2>
</header>

<?php if (!empty($avis)): ?>
    <?php foreach ($avis as $a): ?>
        <p>
            <strong><?= htmlspecialchars($a['date']) ?></strong><br />
            <?= nl2br(htmlspecialchars($a['commentaire'])) ?>
        </p>
        <hr />
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun avis pour l’instant.</p>
<?php endif; ?>

<hr />

<h2>Ajouter un avis</h2>

<form method="post" action="Avis/ajouter/<?= htmlspecialchars($voiture['id']) ?>">
    <p>
        <label for="auteur">Courriel de l'auteur (xxx@yyy.zz)</label>
        <input type="email" name="auteur" id="auteur" required />
        <?= (isset($erreur) && $erreur === 'courriel') ? '<span class="erreur">Entrez un courriel valide s.v.p.</span>' : '' ?>
        <br /><br />

        <label for="commentaire">Votre avis</label><br />
        <textarea name="commentaire" id="commentaire" rows="5" cols="60" required>Écrivez votre avis ici</textarea><br /><br />

        <!-- Pas besoin d'envoyer utilisateur_id : pris depuis la session côté serveur -->
        <!-- Si ton routeur n'a pas l'id dans l'URL, décommente la ligne suivante :
        <input type="hidden" name="voiture_id" value="<?= htmlspecialchars($voiture['id']) ?>">
        -->

        <input type="submit" value="Envoyer" />
    </p>
</form>
