<?php

require_once 'Modele/Voiture.php';

$tstVoiture = new Voiture;
$voitures = $tstVoiture->getVoitures();
echo '<h3>Test getVoitures : </h3>';
var_dump($voitures->rowCount());

echo '<h3>Test getVoiture : </h3>';
$voiture =  $tstVoiture->getVoiture(1);
var_dump($voiture);