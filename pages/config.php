<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=boutiquefmm;charset=utf8', 'matthieu', 'rootmatt');
} catch (Exception $e) {
    die('Erreur : impossible de se connecter à la base de données' . $e->getMessage());
}
