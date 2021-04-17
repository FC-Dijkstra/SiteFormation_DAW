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
        if (!array_key_exists($extension, $formats)) die("Erreur: extension invalide");

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Erreur: fichier trop grand");

        //TODO: voir avec frontend pour la taille max des images.

        if (in_array($filetype, $formats))
        {
            $filename = hash("sha256", $filename . time());
            $fileDir = "data/userIcons/" . $filename . $extension;
            move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . "./back/" . $fileDir);
            return $fileDir;
        }
        else
        {
            die("Erreur lors de l'enregistrement de l'image");
        }
    }
    else
    {
        die("Erreur: " . $_FILES["photo"]["error"]);
    }
}

function deleteUserIcon($iconName)
{
    $check = explode(".", $iconName);
    if (count($check) != 2) die("Erreur, fichier inconnu");
    if (file_exists(__DIR__ . "./../data/userIcons/" . $iconName))
    {
        unlink(__DIR__ . "./../data/userIcons/" . $iconName);
    }
}

function saveCours($id)
{
    $files = array_filter($_FILES["cours"]["name"]);
    $total = count($_FILES["cours"]["name"]);

    for ($i = 0; i < $total; $i++)
    {

    }
}

function deleteCours()
{

}

function saveQCM()
{

}

function deleteQCM()
{

}