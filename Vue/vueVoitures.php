<?php $this->titre = 'Location de voitures'; ?>

<a href="index.php?action=nouvelVoiture">
    <h2 class="titreVoiture">Ajouter une voiture</h2>
</a>
<?php foreach ($voitures as $voiture):
    ?>

<article>
    <header>
        <a href="index.php?action=voiture&id=<?= $voiture['id'] ?>">
            <h1 class="titreVoiture"><?= $voiture['modele'] ?></h1>
        </a>
        <strong><?= $voiture['annee'] ?></strong>
    </header>
    <p><strong>Prix/jour :</strong> <?= $voiture['prix_jour'] ?> $<br />
        <em><?= $voiture['description'] ?></em>
        <a href="index.php?action=modifierVoiture&id=<?= $voiture['id'] ?>"> [modifier la voiture]</a>
    </p>
</article>
<hr />
<?php endforeach; ?>