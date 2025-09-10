<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->

    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">CarRental</h1></a>
                <p>Louez la Article de vos rêves. Simple et efficace !</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé par Calin, Badr et Dylan.
            </footer>
        </div> <!-- #global -->
    </body>
</html>



