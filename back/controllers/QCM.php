<?php

require_once (__DIR__ . "./../helpers/db.php");
require_once (__DIR__ . "./../helpers/print.php");


function getQCM($qcmID)
{
    $result = db::getInstance()->get("evaluations", "id = {$qcmID}");

    if (count($result))
    {
        $lastTry = db::getInstance()->query("SELECT passage FROM resultats ORDER BY resultats.passage DESC")[0]["passage"];

        if (strtotime("-3 days") > strtotime($lastTry))
        {
            $questionID = $result["question"];
            $questionDir = db::getInstance()->getID("fichiersevaluations", $questionID)["dir"];
            if (file_exists(__DIR__ . $questionDir))
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

function validateReponses($qcmID, $reponses)
{
    $reponsesID = db::getInstance()->get( "evaluations", "id = {$qcmID}")->id;
    $dirReponses = db::getInstance()->get("fichiersevaluations", "id = {$reponsesID}")->dir;

    if (file_exists(__DIR__ . $dirReponses))
    {
        $reponsesServer = simplexml_load_file(__DIR__ . $dirReponses);
        $reponsesUser = json_decode($reponses, true);

        $note = 0;
        try{
            if ($reponsesServer->meta->id == $reponsesUser["meta"]["id"])
            {
                foreach($reponsesServer->reponse as $reponse)
                {
                    if ($reponsesUser["reponse"]["id"] == $reponse->id)
                    {
                        if ($reponsesUser["reponse"]["value"] == $reponse->value)
                        {
                            $note++;
                        }
                    }
                }

                echo $note;
                $params = [
                    "passage"=> date("Y-m-d H:i:s"),
                    "evaluation"=>$qcmID,
                    "utilisateur"=>$_SESSION["userID"],
                    "note"=>$note
                ];
                db::getInstance()->insert("resultats", $params);
            }
        }
        catch(Exception $e)
        {}

    }
}
