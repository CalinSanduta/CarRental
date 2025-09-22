<?php $this->titre = "CarRental - Aviss" ?>

<header>
    <h1 id="titreReponses">Avis de CarRental:</h1>
</header>
<?php
foreach ($avis as $avis):
    ?>
    <?php if ($avis['efface'] == '0') : ?>
        <p><a href="Adminavis/confirmer/<?= $this->nettoyer($avis['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($avis['date']) ?>, <?= $this->nettoyer($avis['auteur']) ?> dit : (privé? <?= $this->nettoyer($avis['prive']) ?>)<br/>
            <strong><?= $this->nettoyer($avis['titre']) ?></strong><br/>
            <?= $this->nettoyer($avis['texte']) ?><br />
            <a href="Adminvoitures/lire/<?= $this->nettoyer($avis['voiture_id']) ?>" >
                [Voir la voiture]</a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="Adminavis/retablir/<?= $this->nettoyer($avis['id']) ?>" >
                [Rétablir]</a>
            Avis du <?= $this->nettoyer($avis['date']) ?>, par <?= $this->nettoyer($avis['auteur']) ?> effacé! (privé? <?= $this->nettoyer($avis['prive']) ?>)
        </p>
    <?php endif; ?>
<?php endforeach; ?>