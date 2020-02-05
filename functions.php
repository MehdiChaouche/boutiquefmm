<?php

try {
    $bdd = new PDO ('mysql:host=localhost;dbname=boutiquefmm;charset=utf8','flo','toto');

} catch (PDOException $e) {

    die ('Error');

}

function indexProducts(PDO $ma_bdd):array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, price FROM products ORDER BY arrival_date');
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}


/*foreach ($donnees as $donnee){

    echo $donnee['name'];
    echo $donnees['description'];


}