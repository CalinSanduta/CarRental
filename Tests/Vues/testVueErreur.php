<?php

require_once 'Framework/Vue.php';
$vue = new Vue("erreur");
$vue->generer(['msgErreur' => '*** Message d\'erreur test ***']);

