<!DOCTYPE html>
<head>
    <link href="bootstrap.css" rel="stylesheet" type="text/CSS">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!--- Meta et liens --->
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
    echo $main;
    ?>
</div>
<div>
    <?php
    include 'headerfooter/footer.php';
    ?>
</div>
</body>