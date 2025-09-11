<?php $titre = 'Location de voitures'; ?>

<?php ob_start(); ?>
<?php foreach ($Voitures as $Voiture): ?>
    <Voiture>
        <header>
            <a href="<?= "index.php?action=Voiture&id=" . $Voiture['id'] ?>">
                <h3 class="titreVoiture"><?= $Voiture['titre'] ?><br/>
            </a>
            <small><?= $Voiture['sous_titre'] ?></small></h3>
        </header>
        <time><?= $Voiture['date'] ?></time>, 
        par utilisateur #<?= $Voiture['utilisateur_id'] ?>, 
        <?= $Voiture['type'] ?>
    </Voiture>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
