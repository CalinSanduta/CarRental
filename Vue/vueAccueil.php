<?php $titre = 'Le Blogue du prof'; ?>

<?php ob_start(); ?>
<?php foreach ($Articles as $Article):
    ?>
    <Article>
        <header>
            <a href="<?= "index.php?action=Article&id=" . $Article['id'] ?>">
                <h3 class="titreArticle"><?= $Article['titre'] ?><br/>
            </a>
            <small><?= $Article['sous_titre'] ?></small></h3>
        </header>
        <time><?= $Article['date'] ?></time>, 
        par utilisateur #<?= $Article['utilisateur_id'] ?>, 
        <?= $Article['type'] ?>
    </Article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>