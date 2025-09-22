<?php $this->titre = 'CarRental'; ?>

<a href="Adminvoitures/ajouter">
    <h2 class="titreVoiture">Ajouter une voiture</h2>
</a>

<?php
// sécurité : si la variable n'est pas un tableau, on itère sur []
$voitures = isset($voitures) && is_iterable($voitures) ? $voitures : [];
?>

<?php foreach ($voitures as $v): ?>
    <article>
        <header>
            <a href="Adminvoitures/lire/<?= htmlspecialchars($v['id']) ?>">
                <h1 class="titreVoiture">
                    <?= htmlspecialchars($v['modele']) ?> (<?= htmlspecialchars($v['annee']) ?>)
                </h1>
            </a>
        </header>

        <p>
            <?= nl2br(htmlspecialchars($v['description'])) ?><br/>
            <em><?= htmlspecialchars($v['prix_jour']) ?> $ / jour</em>
            <a href="Adminvoitures/modifier/<?= htmlspecialchars($v['id']) ?>">
                [modifier la voiture]
            </a>
        </p>
    </article>
    <hr/>
<?php endforeach; ?>
