<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=boutiquefmm;charset=utf8', 'matthieu', 'rootmatt');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

