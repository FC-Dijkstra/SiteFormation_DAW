<?php
require_once (__DIR__ . "./../helpers/db.php");
require_once (__DIR__ . "./../helpers/print.php");

//TODO: optimisations SQL.

function recommandations()
{
    $id = 2;
    $result = db::getInstance()->query("SELECT categorie, COUNT(*) as cpt FROM cours WHERE id IN (SELECT cours FROM abonnements WHERE utilisateur = {$id}) GROUP BY categorie ORDER BY cpt DESC LIMIT 3", []);
    var_dump($result);
    println();

    for($i = 0; $i < 3; $i++)
    {
        $categorie =  $result[$i]["categorie"];
        $idCours = db::getInstance()->query("SELECT * FROM cours WHERE id NOT IN (SELECT cours FROM abonnements WHERE utilisateur = {$id}) AND categorie = {$categorie} LIMIT 1", []);
        var_dump($idCours);
        println();
    }
}