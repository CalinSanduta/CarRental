<?php $titre = 'Le Blogue du prof'; ?>

<?php ob_start(); ?>
<?php foreach ($articles as $article):
    ?>
    <article>
        <header>
            <a href="<?= "article.php?id=" . $article['id'] ?>">
                <h1 class="titreArticle"><?= $article['titre'] ?></h1>
            </a>
                <h3 class=""><?= $article['sous_titre'] ?></h3>
            <time><?= $article['date'] ?></time>, par utilisateur #<?= $article['utilisateur_id'] ?>
        </header>
        <p><?= $article['type'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>