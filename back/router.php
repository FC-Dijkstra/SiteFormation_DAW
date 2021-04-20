<?php
session_start();

require_once(__DIR__ . "./controllers/QCM.php");
require_once(__DIR__ . "./controllers/compte.php");
require_once(__DIR__ . "./helpers/token.php");
require_once(__DIR__ . "./helpers/Input.php");
require_once(__DIR__ . "./helpers/print.php");

if (Input::exists())
{
    if (token::check(Input::get("csrf_token")))
    {
        echo "before switch";
        println();
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
                $prenom = htmlentities(Input::get("prenom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $pHash = password_hash(Input::get("password"), PASSWORD_BCRYPT);
                createAccount($nom, $prenom, $email, $pHash);
                break;

            case "connexion":
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = Input::get("password");

                login($email, $password);
                break;

            case "deconnexion":
                if (isset($_SESSION["userID"]))
                {
                    disconnect();
                }
                break;

            default:
                echo "action inconnue";
                println();
                break;
        }
    }
    else
    {
        echo "token invalide";
        println();
    }
}
