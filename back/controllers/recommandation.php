<?php
require_once (__DIR__ . "./../helpers/db.php");
require_once (__DIR__ . "./../helpers/print.php");

function recommendationAbo()
{
    $result = db::getInstance()->query("SELECT categorie, COUNT(*) as cpt FROM cours WHERE id IN (SELECT cours FROM abonnements WHERE utilisateur = ?) GROUP BY categorie ORDER BY cpt DESC LIMIT 1", [$_SESSION["userID"]], true);

    if (!empty($result))
    {
        $categorie =  $result[0]["categorie"];
        $idCours = db::getInstance()->query("SELECT id FROM cours WHERE id NOT IN (SELECT cours FROM abonnements WHERE utilisateur = ?) AND categorie = ? LIMIT 1", [$_SESSION["userID"], $categorie], true);
        return $idCours;
    }

    return null;
}

function recommendationRand()
{
    return db::getInstance()->query("SELECT id FROM cours WHERE id NOT IN (SELECT cours FROM abonnements WHERE utilisateur = ?) ORDER BY RAND() LIMIT 1", [$_SESSION["userID"]], true);
}

function percent($eval, $note)
{
    $maxResult = db::getInstance()->query("SELECT maxResult FROM evaluations WHERE id = ?", [$eval], true);
    return $maxResult / $note * 100;
}

/*
 * On récupère 3 qcm qu'il a passés
 * pour chaque qcm on regarde sa note
 * en fonction du palier ou il se trouve on recommande un cours différent.
 * */
function recommendationQCM()
{
    $qcm = db::getInstance()->query("SELECT note,evaluation FROM resultats WHERE utilisateur = ? LIMIT 1", [$_SESSION["userID"]], true);

    if (!empty($qcms))
    {
        $cid;
        if (percent($qcm[0]["evaluation"], $qcm[0]["note"]) <= 25)
        {
            $cid = db::getInstance()->query("SELECT id FROM cours WHERE difficulte = 'Débutant' AND id NOT IN (SELECT id FROM abonnement WHERE utilisateur = ?)", [$_SESSION["userID"]], true);
        }
        else if (percent($qcm[0]["evaluation"], $qcm[0]["note"]) <= 50)
        {
            $cid = db::getInstance()->query("SELECT id FROM cours WHERE difficulte = 'Intermédiaire' AND id NOT IN (SELECT id FROM abonnement WHERE utilisateur = ?)", [$_SESSION["userID"]], true);
        }
        else if (percent($qcm[0]["evaluation"], $qcm[0]["note"]) <= 75)
        {
            $cid = db::getInstance()->query("SELECT id FROM cours WHERE difficulte = 'Avancé' AND id NOT IN (SELECT id FROM abonnement WHERE utilisateur = ?)", [$_SESSION["userID"]], true);
        }
        else
        {
            $cid = db::getInstance()->query("SELECT id FROM cours WHERE difficulte = 'Expert' AND id NOT IN (SELECT id FROM abonnement WHERE utilisateur = ?)", [$_SESSION["userID"]], true);
        }
        return $cid;
    }

    return null;
}

function getRecommendations()
{
    //récupération des cours et passage a la vue.
    $output = array();
    for ($i = 0; $i < 3 ;$i++)
    {
        $cid = recommendationQCM();
        if (empty($cid))
        {
            $cid = recommendationAbo();
            if (empty($cid))
            {
                $cid = recommendationRand();
            }
        }

        if (!empty($cid))
        {
            $cours = cours::load($cid[0]["id"]);
            array_push($output, $cours);
        }
    }

    return $output;
}