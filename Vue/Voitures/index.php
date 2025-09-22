<?php $this->titre = 'CarRental'; ?> 

<?php foreach ($voitures as $voiture): ?>
    <article>
        <header>
            <a href="index.php?action=lire&id=<?= $voiture['id'] ?>">
                <h1 class="titreVoiture"><?= $voiture['modele'] ?></h1>
            </a>
            <strong>Année : <?= $voiture['annee'] ?></strong><br>
            <strong>Prix par jour : <?= $voiture['prix_jour'] ?> $</strong>
        </header>
        <p><?= $voiture['description'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
