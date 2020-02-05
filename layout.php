<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=$meta>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="boutiquefmm.css">

    <title> <?php echo $titre ?> </title>

</head>

<body>

<header class="bg-warning">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center h1 ">
                Harry Coders
            </div>
            <div class="col-lg-4 text-center">
                <img src="lunettes.png" alt="lunettes harry" class="img-fluid m-2" width="200">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($nav == "index") {
                    ?>active<?php
                } ?>">
                    <a class="nav-link" href="index.php?page=cv">Accueil<span class="sr-only ">(current)</span> </a>
                </li>
                <li class="nav-item <?php if ($nav == "hobby") {
                    ?>active<?php
                } ?>">
                    <a class="nav-link" href="index.php?page=hobby">Hobby<span class="sr-only ">(current)</span> </a>
                </li>
                <li class="nav-item <?php if ($nav == "pitch") {
                    ?>active<?php
                } ?>">
                    <a class="nav-link" href="index.php?page=pitch">Pitch<span class="sr-only ">(current)</span> </a>
                </li>
                <li class="nav-item <?php if ($nav == "contact") {
                    ?>active<?php
                } ?>">
                    <a class="nav-link" href="index.php?page=contact">Contact<span class="sr-only ">(current)</span> </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<footer class="bg-warning">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <p class="col-4 text-center"><a href="mailto:contact@le-campus-numerique.fr"
                                                    class="text-dark"><img src="mail.png" width="30" height="30"
                                                                           title="mail"
                                                                           alt="mail"><br>
                            contact@le-campus-numerique.fr</a>
                    </p>
                    <p class="col-4 text-center"><img src="adresse.png" alt="lieu" width="30" height="30"/><br>
                        33 Grande Rue,26000 valence</p>
                    <p class="col-4 text-center"><img src="tel.png" alt="tel" width="30" height="30"><br>
                        04
                        75 78 61 33</p>
                </div>
            </div>
            <div class="d-none col-lg-4 d-lg-block text-center">
                <img src="lunettes.png" alt="lunettes d'harry potter" width="120" height="60">
            </div>
        </div>
    </div>

</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>