<?php

require_once 'Framework/Vue.php';
$voitures = [
   [
        'id'         => 1,
        'modele'     => 'Toyota Corolla',
        'annee'      => 2020,
        'description'=> 'Compacte fiable, idéale en ville.',
        'prix_jour'  => 45.0
    ],
    [
        'id'         => 2,
        'modele'     => 'Honda Civic',
        'annee'      => 2019,
        'description'=> 'Économique, bon confort.',
        'prix_jour'  => 50.0
    ],
];
$vue = new Vue('index', 'Voitures');
$vue->generer(['voitures' => $voitures]);

