<?php

require_once(__DIR__ . "./../helpers/db.php");
require_once(__DIR__ . "./../helpers/print.php");
require_once(__DIR__ . "./../helpers/config.php");
require_once(__DIR__ . "./../helpers/file.php");

function listQCM()
{
    $web = db::getInstance()->query("SELECT * FROM evaluations WHERE cours in ( SELECT id FROM cours WHERE categorie in (SELECT id FROM categories WHERE titre LIKE '%Web%'));", [], true);
    $app = db::getInstance()->query("SELECT * FROM evaluations WHERE cours in ( SELECT id FROM cours WHERE categorie in (SELECT id FROM categories WHERE titre LIKE '%App%'));", [], true);

    return [$web, $app];
}

function getQCMname($id)
{
    $name = db::getInstance()->query("SELECT nom FROM cours WHERE id = ?", [$id], true)[0]["nom"];
    return $name;
}

function getAllCours()
{
    $output = db::getInstance()->query("SELECT id, nom FROM cours");
    return $output;
}

function saveQCM($maxResultat, $cours)
{
    $reponseFile;
    $questionFile;
    try {
        $files = saveQCMfiles();
        $questionFile = $files[0];
        $reponseFile = $files[1];

    }catch (Exception $e)
    {
        redirect::to("accueil");
        exit();
    }

    $params = [
        "maxResultat"=> $maxResultat,
        "questionsFile"=>$questionFile,
        "reponsesFile"=>$reponseFile,
        "cours"=>$cours
    ];
    db::getInstance()->insert(config::$EVAL_TABLE, $params);
    if (db::getInstance()->hasError())
    {
        deleteQCMfiles();
        redirect::to("accueil");
    }
    else
    {
        redirect::to("accueil");
    }
}

function deleteQCM($qcmID)
{
    $qcm = db::getInstance()->getID(config::$EVAL_TABLE, $qcmID);
    if (!empty($qcm))
    {
        $questionFile = $qcm["questionsFile"];
        $reponsesFile = $qcm["reponsesFile"];
        deleteQCMfiles($questionFile, $reponsesFile);

        db::getInstance()->delete(config::$EVAL_TABLE, $qcmID);
    }
}

function getQCM($qcmID)
{
    $eval = db::getInstance()->getID(config::$EVAL_TABLE, $qcmID);
    if (count($eval))
    {
        $lastTry = db::getInstance()->query("SELECT passage FROM resultats WHERE utilisateur = ? ORDER BY resultats.passage DESC", [$_SESSION["userID"]]);

        if (count($lastTry) == 0 || strtotime("-3 days") > strtotime($lastTry[0]["passage"]))
        {
            $questionDir = $eval["questionsFile"];
            if (file_exists(__DIR__ . "./../data/evaluation/questions/" . $questionDir))
            {
                //parsing + envoi à la vue

                $xml = simplexml_load_file(__DIR__ . "./../data/evaluation/questions/" . $questionDir);
                $json = json_encode($xml);
                $array = json_decode($json);
                $qcm_serialized = serialize($array);

                redirect::to("QCM",null, ["qcm" => $qcm_serialized]);
            }
            else
            {
                redirect::to("profil", "Erreur interne, fichier inexistant");
            }
        }
        else
        {
            redirect::to("profil", "Vous devez attendre avant de recommencer le QCM.");
        }
    }
    else
    {
        redirect::to("accueil", "Le QCM demandé n'existe pas");
    }
}

function validateReponses($qcmID, $reponses)
{
    $eval = db::getInstance()->getID("evaluations", $qcmID);
    $dirReponses = $eval["reponsesFile"];
    $lastTry = db::getInstance()->query("SELECT passage FROM resultats WHERE utilisateur = ? ORDER BY resultats.passage DESC", [$_SESSION["userID"]]);
    if (count($lastTry) == 0 || strtotime("-3 days") > strtotime($lastTry[0]["passage"]))
    {
        if (file_exists(__DIR__ . "./../data/evaluation/reponses/" . $dirReponses)) {
            $reponsesServer = simplexml_load_file(__DIR__ . "./../data/evaluation/reponses/" . $dirReponses);
            $reponsesUser = json_decode($reponses, true);
                
            $note = 0;
            try {
                if ($reponsesServer->meta->id == $reponsesUser["meta"]["id"]) {
                    $i = 0;
                    foreach ($reponsesServer->reponse as $reponse) {

                        if ($reponsesUser["reponse"][$i]["id"] == $reponse->id) {
                            if ($reponsesUser["reponse"][$i]["value"] == $reponse->value) {
                                $note++;
                            }
                        }
                        $i++;
                    }

                    if ($note <= $eval["maxResultat"]) {
                        $params = [
                            "passage" => date("Y-m-d H:i:s"),
                            "evaluation" => $qcmID,
                            "utilisateur" => $_SESSION["userID"],
                            "note" => $note
                        ];
                        db::getInstance()->insert("resultats", $params);
                        redirect::to("profil", "Votre note est de: $note / {$eval["maxResultat"]}");
                    } else {
                        redirect::to("accueilQCM", "Erreur, note trop élevée");
                    }
                }
                else
                {
                    redirect::to("accueilQCM", "Erreur, méta invalide");
                }
            } catch (Exception $e) {
                logger::log($e->getMessage());
                redirect::to("accueilQCM", "Erreur lors de la validation du QCM");
            }
        } else {
            redirect::to("accueilQCM", "Erreur, évaluation inexistante");
        }
    }
    else
    {
        redirect::to("accueilQCM", "Erreur, cooldown actif");
    }
}
