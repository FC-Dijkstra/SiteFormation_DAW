<?php
session_start();

require_once(__DIR__ . "./controllers/QCM.php");
require_once(__DIR__ . "./controllers/compte.php");
require_once(__DIR__ . "./controllers/ListeCours.php");
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
                $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                getQCM($id);
                break;

            case "validerQCM":
                $qcmID = filter_input(INPUT_POST, "qcmID", FILTER_SANITIZE_NUMBER_INT);
                $reponses = Input::get("reponses"); //TODO: sanitisation

                if (isset($qcmID) && isset($reponses))
                    validateReponses($qcmID, $reponses);
                else
                    redirect::to("accueil");
                break;

            case "inscription":
                $nom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $prenom = htmlentities(Input::get("prenom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $pHash = password_hash(Input::get("password"), PASSWORD_BCRYPT);

                if (isset($nom) && isset($prenom) && isset($email) && isset($pHash))
                    createAccount($nom, $prenom, $email, $pHash);
                else
                    redirect::to("inscription");
                break;

            case "connexion":
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = Input::get("password");

                if (isset($email) && isset($password))
                    login($email, $password);
                else
                    redirect::to("connexion");
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
                    redirect::to("accueil");

                break;

            case "unfollow":
                $id = $_SESSION["userID"];
                $coursID = filter_input(INPUT_GET, "cours", FILTER_SANITIZE_NUMBER_INT);

                if (isset($id) && isset($coursID))
                    unfollow($id, $coursID);
                else
                    redirect::to("accueil");

                break;

            case "unfollowAsync":
                $coursID = filter_input(INPUT_POST, "cours", FILTER_SANITIZE_NUMBER_INT);
                if (isset($_SESSION["userID"]) && isset($coursID))
                {
                    $id = $_SESSION["userID"];
                    unfollowAsync($id, $coursID);
                }
                else
                {
                    echo "Erreur: paramètres invalides !";
                }
                break;

            case "follow":  //! ASYNC
                $coursID = filter_input(INPUT_POST, "cours", FILTER_SANITIZE_NUMBER_INT);

                if(isset($_SESSION["userID"]) && isset($coursID)) {
                    $id = $_SESSION["userID"];

                    follow($id, $coursID);
                }
                else
                {
                    echo "Erreur: paramètres invalides !";
                }
                break;

            default:
                redirect::to("accueil");
                break;
        }
    }
    else
    {
        redirect::to("accueil", "Vérification CSRF invalide !");
    }
}
