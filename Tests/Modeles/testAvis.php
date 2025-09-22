<?php

require_once 'Modele/Avis.php';

$tstAvis = new Avis;
$avis = $tstAvis->getAvis(1);
echo '<h3>Test getAvis : </h3>';
var_dump($avis->rowCount());

$avis = $tstAvis->getAvis(1);
echo '<h3>Test getAvis : </h3>';
var_dump($avis);