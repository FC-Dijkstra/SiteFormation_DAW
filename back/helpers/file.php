<?php
require_once(__DIR__ . "./warning2error.php");

function saveUserIcon()
{
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0)
    {
        $formats = array("jpg" => "image/jpg", "jpeg"=> "image/jpeg", "png"=>"image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($extension, $formats)) throw new Exception("Erreur: extension invalide");

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) throw new Exception("Erreur: fichier trop grand");

        //TODO: voir avec frontend pour la taille max des images.

        if (in_array($filetype, $formats))
        {
            $filename = hash("sha256", $filename . time());
            move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . "./../data/userIcons/" . $filename . "." .$extension);
            return $filename . "." . $extension;
        }
        else
        {
            throw new Exception("Erreur lors de l'enregistrement de l'image");
        }
    }
    else
    {
        throw new Exception("Erreur: " . $_FILES["photo"]["error"]);
    }
}

function deleteUserIcon($iconName)
{
    if ($iconName != utilisateur::$defaultIcon)
    {
        $check = explode(".", $iconName);
        if (count($check) != 2) die("Erreur, fichier inconnu");
        if (file_exists(__DIR__ . "./../data/userIcons/" . $iconName))
        {
            unlink(__DIR__ . "./../data/userIcons/" . $iconName);
        }
    }

}

function saveCours($id)
{
    $formats = array("html"=>"text/html", "jpg"=>"image/jpg", "jpeg"=>"image/jpeg", "png"=>"image/png", "mp4"=>"video/mp4", "gif"=>"image/gif");
    $total = count($_FILES["cours"]["name"]);

    mkdir(__DIR__ . "./../data/cours/" . $id);

    for ($i = 0; $i < $total; $i++)
    {
        $filename = $_FILES["cours"]["name"][$i];
        $filetype = $_FILES["cours"]["type"][$i];
        $filesize = $_FILES["cours"]["size"][$i];

        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($extension, $formats)) die("Erreur, extension invalide");

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Erreur, fichier trop grand");

        if (in_array($filetype, $formats))
        {
            move_uploaded_file($_FILES["cours"]["tmp_name"][$i], __DIR__ . "./../data/cours/" . $id . "/" . $_FILES["cours"]["name"][$i]);
        }
    }
}

function deleteCours($coursName)
{
	$check = explode(".", $coursName);
    if (count($check) != 2) die("Erreur, fichier inconnu");
    if (file_exists(__DIR__ . "./../data/cours/" . $coursName))
    {
        unlink(__DIR__ . "./../data/cours/" . $coursName);
    }
}

function saveQCMfiles()
{
	$formats = array("xml"=>"text/xml");
    $total = count($_FILES["QCM"]["name"]);

    if ($total == 2){
        $filenameQuestions = $_FILES["QCM"]["name"][0];
        $filetypeQuestions = $_FILES["QCM"]["type"][0];
        $filesizeQuestions = $_FILES["QCM"]["size"][0];

        $filenameReponses = $_FILES["QCM"]["name"][1];
        $filetypeReponses = $_FILES["QCM"]["type"][1];
        $filesizeReponses = $_FILES["QCM"]["size"][1];

        $extensionQuestions = pathinfo($filenameQuestions, PATHINFO_EXTENSION);
        if (!array_key_exists($extensionQuestions, $formats)) die("Erreur, extension invalide");

        $extensionReponses = pathinfo($filenameReponses, PATHINFO_EXTENSION);
        if (!array_key_exists($extensionReponses, $formats)) die("Erreur, extension invalide");

        $maxsize = 5 * 1024 * 1024;
        if ($filesizeQuestions > $maxsize) die("Erreur, fichier trop grand");
        if ($filesizeReponses > $maxsize) die("Erreur, fichier trop grand");

        if (in_array($filetypeQuestions, $formats) && in_array($filetypeReponses, $formats))
        {
            $filenameQuestions = hash("sha256", $filenameQuestions . time());
            $filenameReponses = hash("sha256", $filenameReponses . time());
            move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . "./../data/evaluation/questions/" . $filenameQuestions . "." .$extensionQuestions);
            move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . "./../data/evaluation/reponses/" . $filenameReponses . "." .$extensionQuestions);
            return [$filenameQuestions . "." . $extensionQuestions, $filenameReponses . "." . $extensionQuestions];
        }
    }
}

function deleteQCMfiles($qFile, $rFile)
{
    $checkQ = explode(".", $qFile);
    $checkR = explode(".", $rFile);
    if (count($checkQ) == 2 && count($checkR) == 2)
    {
        if (file_exists(__DIR__ . "./../data/evaluation/questions/" . $qFile) && file_exists(__DIR__ . "./../data/evaluation/reponses/" . $rFile))
        {
            unlink(__DIR__ . "./../data/evaluation/questions/" . $qFile);
            unlink(__DIR__ . "./../data/evaluation/reponses/" . $rFile);
        }
    }
}