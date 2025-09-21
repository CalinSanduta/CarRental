<?php

class Session {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setAttribut($nom, $valeur) {
        $_SESSION[$nom] = $valeur;
    }

    public function getAttribut($nom) {
        return isset($_SESSION[$nom]) ? $_SESSION[$nom] : null;
    }

    public function existeAttribut($nom) {
        return isset($_SESSION[$nom]);
    }

}
