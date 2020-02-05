<?php
$titre_page = 'Accueil';
$description_page = "Page principale";
$showProducts = indexProducts($bdd);
?>
<meta name="description" content="<?php
    if (isset($description_page)) {
        echo $description_page;
    } else { // Condition déterminant la description de la page
        echo $description_page = 'Description par défaut';
    }
    ?>">
    <title>
        <?php
        if (isset($titre_page)) {
            echo $titre_page;
        } else // Condition déterminant le titre de l'onglet/page
        {
            echo "Titre de la page";
        }
        ?>
    </title>
</head>
<body>
<div>
    <?php
    include './headerfooter/header.php';
    ?>
</div>
<div>
<?php
foreach ($showProducts as $showProduct) {
    echo '<p>'. $showProduct['name'] .'</p>';
}
 ?>
</div>
<div>
    <?php
    include 'headerfooter/footer.php';
    ?>
</div>
</body>


