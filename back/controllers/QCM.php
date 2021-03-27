<?php

function getQCM($id)
{
    if ($id == "test")
    {
        if (file_exists(__DIR__ . "/../XML/QCM.xml"))
        {
            $xml = simplexml_load_file(__DIR__ . "/../XML/quesions.xml");
            $json = json_encode($xml);
            echo $json;
        }
        else
        {
            echo "fichier introuvable";
        }
    }
}

function validateReponses($reponsesXML)
{
    
}