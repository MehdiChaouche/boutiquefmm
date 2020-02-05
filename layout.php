<!DOCTYPE html>
<head>
    <link href="bootstrap.css" rel="stylesheet" type="text/CSS">
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/product/">
    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel=\"apple-touch-icon\" href=\"/docs/4.4/assets/img/favicons/apple-touch-icon.png\" sizes=\"180x180\">
    <link rel=\"icon\" href=\"/docs/4.4/assets/img/favicons/favicon-32x32.png\" sizes=\"32x32\" type=\"image/png\">
    <link rel=\"icon\" href=\"/docs/4.4/assets/img/favicons/favicon-16x16.png\" sizes=\"16x16\" type=\"image/png\">
    <link rel=\"manifest\" href=\"/docs/4.4/assets/img/favicons/manifest.json\">
    <link rel=\"mask-icon\" href=\"/docs/4.4/assets/img/favicons/safari-pinned-tab.svg\" color=\"#563d7c\">
    <link rel=\"icon\" href=\"/docs/4.4/assets/img/favicons/favicon.ico\">
    <meta name=\"msapplication-config\" content=\"/docs/4.4/assets/img/favicons/browserconfig.xml\">
    <meta name=\"theme-color\" content=\"#563d7c\">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!--- Meta et liens --->
    <meta name="generator" content="Jekyll v3.8.6">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
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

</div>
<div>
    <?php
    include 'headerfooter/footer.php';
    ?>
</div>
</body>

<?php
include 'layout.php';