<?php
session_start();

require_once(__DIR__ . "./controllers/QCM.php");
require_once(__DIR__ . "./controllers/compte.php");
require_once(__DIR__ . "./controllers/ListeCours.php");
require_once(__DIR__ . "./controllers/Cours.php");
require_once(__DIR__ . "./controllers/Forum.php");
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
                $id = filter_var(Input::get("id"), FILTER_SANITIZE_NUMBER_INT);
                getQCM($id);
                break;

            case "validerQCM":
                $qcmID = filter_var(Input::get("qcmID"), FILTER_SANITIZE_NUMBER_INT);
                $reponses = Input::get("reponses"); //TODO: sanitisation

                if (isset($qcmID) && isset($reponses))
                    validateReponses($qcmID, $reponses);
                else
                    redirect::to("accueilQCM");
                break;

            case "inscription":
                $nom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $prenom = htmlentities(Input::get("prenom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $email = filter_var(Input::get("email"), FILTER_SANITIZE_EMAIL);
                $pHash = password_hash(Input::get("password"), PASSWORD_BCRYPT);

                if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($pHash))
                    createAccount($nom, $prenom, $email, $pHash);
                else
                    redirect::to("inscription");
                break;

            case "connexion":
                $email = filter_var(Input::get("email"), FILTER_SANITIZE_EMAIL);
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
                $email = filter_var(Input::get("email"), FILTER_SANITIZE_EMAIL);
                $nom = htmlentities(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $prenom = htmlentities(Input::get("prenom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $oldPassword = Input::get("password");
                $newPassword = Input::get("newpassword");

                if (!empty($id) && !empty($email) && !empty($nom) && !empty($prenom) && !empty($oldPassword) && !empty($newPassword))
                    editAccount($id, $nom, $prenom, $email, $newPassword, $oldPassword);
                else
                    redirect::to("accueil", "Erreur, informations invalides");

                break;

            case "unfollow":
                $id = $_SESSION["userID"];
                $coursID = filter_var(Input::get("cours"), FILTER_SANITIZE_NUMBER_INT);

                if (isset($id) && isset($coursID))
                    unfollow($id, $coursID);
                else
                    redirect::to("accueil");

                break;

            case "unfollowAsync":
                $coursID = filter_var(Input::get("cours"), FILTER_SANITIZE_NUMBER_INT);
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
                $coursID = filter_var(Input::get("cours"), FILTER_SANITIZE_NUMBER_INT);

                if(isset($_SESSION["userID"]) && isset($coursID)) {
                    $id = $_SESSION["userID"];

                    follow($id, $coursID);
                }
                else
                {
                    echo "Erreur: paramètres invalides !";
                }
                break;

			case "removeAccount":
                if(isset($_SESSION["userID"])) {
                    $id = $_SESSION["userID"];
					removeAccount($id);
                }
                else
                {
                    redirect::to("acceuil","paramètre invalide");
                }
                break;
				
            case "sendMessage":
                $conversation = filter_var(Input::get("conversation"), FILTER_SANITIZE_NUMBER_INT);
                $contenu = htmlspecialchars(Input::get("contenu"), ENT_QUOTES | ENT_SUBSTITUTE);
                $date = date("Y-m-d H:i:s");

                if (isset($conversation) && isset($auteur) && !empty($contenu) && isset($_SESSION["userID"]))
                {
                    sendMessage($conversation, $_SESSION["userID"], $contenu, $date);
                }
                else
                {
                    redirect::to("messagesForum", "Erreur lors de l'envoi du message", ["id"=>$conversation]);
                    //echo "Erreur lors de l'envoi du message";
                }
                break;

            case "createConversation":
                $categorie = filter_var(Input::get("categorie"), FILTER_SANITIZE_NUMBER_INT);
                $titre = htmlspecialchars(Input::get("titre"), ENT_QUOTES | ENT_SUBSTITUTE);

                if (isset($_SESSION["userID"]) && isset($categorie) && !empty($titre))
                    createConversation($categorie, $titre);
                else
                {
                    redirect::to("conversations", "Erreur lors de la création de la conversation", ["id"=>$categorie]);
                    //echo "Erreur lors de la création de la conversation";
                }
                break;

            case "createCategorie":
                $categorie = htmlspecialchars(Input::get("categorie"), ENT_SUBSTITUTE | ENT_QUOTES);
                $subcategorie = htmlspecialchars(Input::get("subcategorie"), ENT_QUOTES | ENT_SUBSTITUTE);

                if(!empty($_SESSION["admin"]) && !empty($categorie) && !empty($subcategorie))
                    createCategorie($categorie, $subcategorie);
                else
                {
                    redirect::to("accueilForum", "Erreur lors de la création de la catégorie");
                    //echo "Erreur lors de la création de la catégorie";
                }
                break;

            case "lockConversation":
                $conversation = filter_var(Input::get("conversation"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($conversation))
                    lockConversation($conversation);
                else
                {
                    redirect::to("conversations", "Erreur", ["id"=>$conversation]);
                    //echo "Erreur";
                }
                break;

            case "deleteMessage":
                $message = filter_var(Input::get("message"), FILTER_SANITIZE_NUMBER_INT);
                $conversation = filter_var(Input::get("conversation"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($message) && isset($conversation))
                {
                    deleteMessage($message, $conversation);
                }
                else if (isset($_SESSION["userID"]) && isset($message) && isset($conversation))
                {
                    removeMessage($message, $_SESSION["userID"], $conversation);
                }
                else
                {
                    redirect::to("messagesForum", "Erreur, paramètres invalides", ["id" => $conversation]);
                }

                break;

            case "saveQCM":
                $cours = filter_var(Input::get("cours"), FILTER_SANITIZE_NUMBER_INT);
                $maxResultat = filter_var(Input::get("maxResultat"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($cours) && isset($maxResultat))
                    saveQCM($maxResultat, $cours);
                else
                    redirect::to("accueil");
                break;

            case "deleteQCM":
                $qcmID = filter_var(Input::get("qcmID"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($qcmID))
                    deleteQCM($qcmID);
                else
                    redirect::to("accueil");
                break;
			
			case "saveCours":
				if (!empty($_SESSION["admin"]))
				{
					saveCoursFold();
				}
				else
					redirect::to("accueil");
				break;
			
            case "deleteCours":
                $cours = filter_var(Input::get("cours"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($cours))
                    deleteCours($cours);
                else
                    redirect::to("profilAdmin", "Erreur, paramètres invalides");
                break;

            case "deleteUser":  //ASYNC + ADMIN
                $utilisateur = filter_var(Input::get("utilisateur"), FILTER_SANITIZE_NUMBER_INT);

                if (!empty($_SESSION["admin"]) && isset($utilisateur))
                    deleteAccount($utilisateur);
                else
                    echo "Erreur, paramètres invalides";
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
