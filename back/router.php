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

                if (isset($nom) && isset($prenom) && isset($email) && isset($pHash))
                    createAccount($nom, $prenom, $email, $pHash);
                else
                    redirect::to($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Utilisateur/inscription.php");
                break;

            case "connexion":
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = Input::get("password");

                if (isset($email) && isset($password))
                    login($email, $password);
                else
                    redirect::to($_SERVER["DOCUMENT_ROOT"] . "/front/PHP/Utilisateur/connexion.php");
                break;

            case "deconnexion":
                if (isset($_SESSION["userID"]))
                    disconnect();

                break;

            case "editprofile":
                $id = $_SESSION["userID"];
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $nom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $prenom = htmlentities(Input::get("prenom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $oldPassword = Input::get("password");
                $newPassword = Input::get("newpassword");

                if (isset($id) && isset($email) && isset($nom) && isset($prenom) && isset($oldPassword) && isset($newPassword))
                    editAccount($id, $nom, $prenom, $email, $newPassword, $oldPassword);
                else
                    logger::log("edition invalide");
                    redirect::to("/front/PHP/accueil.php");

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
