<?php $this->titre = 'Location de voitures'; ?>

<?php ob_start(); ?>
<?php foreach ($Voitures as $Voiture): ?>
    <Voiture>
        <header>
            <a href="<?= "voiture/index/" . $Voiture['id'] ?>">
                <h3 class="titreVoiture"><?= $Voiture['modele'] ?> (<?= $Voiture['annee'] ?>)<br/>
            </a>
            <small><?= $Voiture['description'] ?></small></h3>
        </header>
        <p>Prix par jour : <?= $Voiture['prix_jour'] ?> $</p>
    </Voiture>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
