<?php

require_once(__DIR__ . "./../helpers/db.php");
require_once(__DIR__ . "./../helpers/print.php");


function getQCM($qcmID)
{
    $eval = db::getInstance()->getID("evaluation", $qcmID);

    if (count($eval))
    {
        $lastTry = db::getInstance()->query("SELECT passage FROM resultats ORDER BY resultats.passage DESC")[0]["passage"];

        if (strtotime("-3 days") > strtotime($lastTry))
        {

            $questionDir = $eval["questionfile"];
            if (file_exists(__DIR__ . "./../" . $questionDir))
            {
                //parsing + envoi à la vue
            }
        }
        else
        {
            //message cooldown.
        }
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
