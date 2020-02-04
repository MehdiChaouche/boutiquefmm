<?php
/**
 * @param $var
 */
function debug($var)
{
    highlight_string("<?php\n\n" . var_export($var, true) . ";\n?>");
}

function newProducts(PDO $mabdd)
{
    $query = $mabdd->query('SELECT id, name, description, price FROM products ORDER BY arrivale_date DESC LIMIT 6');
    $response = $query->fetchAll(PDO::FETCH_ASSOC);
    return $response;
}