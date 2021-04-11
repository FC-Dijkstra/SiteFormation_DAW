<?php
session_start();

require_once(__DIR__ . "./controllers/QCM.php");
require_once(__DIR__ . "./controllers/connexion.php");

//définition du token anti csrf
if (empty($_SESSION["token"]))
{
    $_SESSION["token"] = bin2hex(random_bytes(32));
}

if (Input::exists())
{
    if (hash_equals($_SESSION["token"], Input::get("token")))
    {
        switch(Input::get("action"))
        {
            case "getQCM":
                $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                getQCM($id);
                break;

            case "validerQCM":
                $qcmID = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
                $reponses = Input::get("reponses"); //TODO: sanitisation
                validateReponses($qcmID, $reponses);
                break;

            case "inscription":
                $nom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $prenom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = Input::get("password");

                createAccount($nom, $prenom, $email, $password);
                break;

            case "connexion":
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = Input::get("password");

                login($email, $password);
                break;

        }
    }
}
