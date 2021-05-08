<?php
require_once (__DIR__ . "./../helpers/db.php");
require_once (__DIR__ . "./../helpers/print.php");

function recommandations($id)
{
    $result = db::getInstance()->query("SELECT categorie, COUNT(*) as cpt FROM cours WHERE id IN (SELECT cours FROM abonnements WHERE utilisateur = ?) GROUP BY categorie ORDER BY cpt DESC LIMIT 3", [$id]);

    $ids = array();

    //Cours liés à la moyenne des catégories intéressées
    for ($i = 0; $i < count($result); $i++)
    {
        $categorie =  $result[$i]["categorie"];
        $idCours = db::getInstance()->query("SELECT id FROM cours WHERE id NOT IN (SELECT cours FROM abonnements WHERE utilisateur = ?) AND categorie = ? LIMIT 1", [$id, $categorie]);
        array_push($ids, $idCours[0]["id"]);
    }

    //remplissage si pas assez de recommandations.
    while (count($ids) < 3)
    {
        $idCours = db::getInstance()->query("SELECT id FROM cours WHERE id NOT IN (SELECT cours FROM abonnements WHERE utilisateur = ?) ORDER BY RAND() LIMIT 1", [$id]);
        array_push($ids, $idCours[0]["id"]);
    }

    //récupération des cours et passage a la vue.
    $output = array();
    for ($i = 0; $i < count($ids); $i++)
    {
        $cours = cours::load($ids[$i]);
        array_push($output, $cours);
    }

    return $output;
}