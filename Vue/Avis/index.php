<?php $this->titre = "CarRental - Avis" ?>

<header>
    <h1 id="titreReponses">Avis de CarRental :</h1>
</header>
<?php
foreach ($avis as $avis):
    ?>
    <?php if ($avis['efface'] == '0') : ?>
        <p>
            <?= $this->nettoyer($avis['date']) ?>, <?= $this->nettoyer($avis['auteur']) ?> dit : (privé? <?= $this->nettoyer($avis['prive']) ?>)<br/>
            <strong><?= $this->nettoyer($avis['titre']) ?></strong><br/>
            <?= $this->nettoyer($avis['texte']) ?><br />
            <a href="Voiture/lire/<?= $this->nettoyer($avis['voiture_id']) ?>" >
                [Voir la voiture]</a>
        </p>
    <?php endif; ?>
<?php endforeach; ?>