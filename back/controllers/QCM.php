<?php

require_once(__DIR__ . "./../helpers/db.php");
require_once(__DIR__ . "./../helpers/print.php");
require_once(__DIR__ . "./../helpers/config.php");

function getQCM($qcmID)
{
    $eval = db::getInstance()->getID(config::$EVAL_TABLE, $qcmID);
    if (count($eval))
    {
        $lastTry = db::getInstance()->query("SELECT passage FROM resultats ORDER BY resultats.passage DESC")[0]["passage"];

        if (strtotime("-3 days") > strtotime($lastTry))
        {
            $questionDir = $eval["questionsFile"];
            if (file_exists(__DIR__ . "./../" . $questionDir))
            {
                //parsing + envoi à la vue

                $xml = simplexml_load_file(__DIR__ . "./../" . $questionDir);
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

function validateReponses($qcmID, $reponses, $user)
{
    $eval = db::getInstance()->getID("evaluations", $qcmID);
    $dirReponses = $eval["reponsesFile"];

    if (file_exists(__DIR__ . "./../" . $dirReponses))
    {
        $reponsesServer = simplexml_load_file(__DIR__ . "./../" . $dirReponses);
        $reponsesUser = json_decode($reponses, true);

        $note = 0;
        try
        {
            if ($reponsesServer->meta->id == $reponsesUser["meta"]["id"])
            {
                foreach ($reponsesServer->reponse as $reponse)
                {

                    if ($reponsesUser["reponse"]["id"] == $reponse->id)
                    {
                        if ($reponsesUser["reponse"]["value"] == $reponse->value)
                        {
                            $note++;
                        }
                    }
                }

                if ($note < $eval["maxResultat"])
                {
                    echo $note;
                    $params = [
                        "passage" => date("Y-m-d H:i:s"),
                        "evaluation" => $qcmID,
                        "utilisateur" => $_SESSION["userID"],
                        "note" => $note
                    ];
                    db::getInstance()->insert("resultats", $params);
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
}
