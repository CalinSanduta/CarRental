<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleVoiture') {
        require 'Tests/Modeles/testVoiture.php';
    } else if ($_GET['test'] == 'modeleAvis') {
        require 'Tests/Modeles/testAvis.php';
    } else if ($_GET['test'] == 'modeleType') {
        require 'Tests/Modeles/testType.php';
    } else if ($_GET['test'] == 'vueVoitures') {
        require 'Tests/Vues/testVueVoitures.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modeleVoiture">Voiture</a>
    </li>
    <li>
        <a href="tests.php?test=modeleAvis">Avis</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueVoitures">Voitures</a>
    </li>
    <li>
        <a href="tests.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>
