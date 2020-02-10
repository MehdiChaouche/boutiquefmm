<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'functions.php';
include 'header.php';

?>

    <div class="container row mt-4 mx-auto">
        <div class="card-columns">
            <p>Merci de votre commande.</p>
        </div>
    </div>


<?php
include 'footer.php';