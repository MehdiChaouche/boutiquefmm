<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'functions.php';
include 'header.php';

?>

    <p>Votre panier est vide.</p>
    <p>Merci d'ajouter au moins 1 article.</p>


<?php
include 'footer.php';