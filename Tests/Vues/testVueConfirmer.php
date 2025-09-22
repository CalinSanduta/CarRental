<?php

require_once 'Framework/Vue.php';
$avis = [
    'id'             => 999,
    'voiture_id'     => 111,
    'utilisateur_id' => 7,
    'date'           => '2025-09-21',
    'commentaire'    => 'Très bonne voiture, propre et économique.',
    'efface'         => 0,
    ];
$vue = new Vue('confirmer', 'AdminAvis');
$vue->generer(['avis' => $avis]);

