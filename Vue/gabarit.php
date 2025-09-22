<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/style.css" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="#" class="lang-switch" data-locale="fr">Français</a> |
                <a href="#" class="lang-switch" data-locale="en">English</a> |
                <a href="#" class="lang-switch" data-locale="ru">Русский</a>

                <a href="index.php"><h1 id="titreBlog">CarRental</h1></a>
                <p>Louez la voiture de vos rêves. Simple et efficace !</p>
                <a href="<?= $utilisateur != null ? 'Admin' : ''; ?>Avis">
                    <h4>Afficher tous les commentaires de tous les articles</h4>
                </a>
                <a href="Apropos">
                    <h4>À propos</h4>
                </a>
                <a href="tests.php">
                    <h3>TESTS</h3>
                </a>
                <?php if (isset($utilisateur)) : ?>
                    <h3>Bonjour <?= $utilisateur['prenom'] ?>,
                        <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
                    </h3>
                <?php else : ?>
                    <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
                <?php endif; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé par Calin, Badr et Dylan.
            </footer>
        </div> <!-- #global -->
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script src="Contenu/js/autocompleteType.js"></script>
        <script src="Contenu/jquery.i18n/src/CLDRPluralRuleParser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
        <script src="Contenu/i18n/main-jquery_i18n.js"></script>
    </body>
</html>



