<?php $titre = "CarRental - " . $voiture['titre']; ?>

<article>
    <header>
        <a href="Adminvoitures/modifier/<?= $voiture['id'] ?>"> [modifier la voiture]</a><br>
        <h1 class="titreVoiture"><?= $voiture['titre'] ?></h1>
        <time><?= $voiture['date'] ?></time>, par utilisateur #<?= $voiture['utilisateur_id'] ?>
        <h3 class=""><?= $voiture['sous_titre'] ?></h3>
    </header>
    <p><?= $voiture['texte'] ?></p>
    <p><?= $voiture['type'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $voiture['titre'] ?> :</h1>
</header>

<?php
foreach ($avis as $avis):
    ?>
    <?php if ($avis['efface'] == '0') : ?>
        <p><a href="Adminavis/confirmer/<?= $this->nettoyer($avis['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($avis['date']) ?>, <?= $this->nettoyer($avis['auteur']) ?> dit : (privé? <?= $this->nettoyer($avis['prive']) ?>)<br/>
            <strong><?= $this->nettoyer($avis['titre']) ?></strong><br/>
            <?= $this->nettoyer($avis['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="Adminavis/retablir/<?= $this->nettoyer($avis['id']) ?>" >
                [Rétablir]</a>
            Avis EFFACÉ du <?= $this->nettoyer($avis['date']) ?>, par <?= $this->nettoyer($avis['auteur']) ?> (privé? <?= $this->nettoyer($avis['prive']) ?>)
        </p>
    <?php endif; ?>
<?php endforeach; ?>

