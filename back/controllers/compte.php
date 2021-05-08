<?php
require_once(__DIR__ . "./../class/utilisateur.php");
require_once(__DIR__ . "./../helpers/print.php");
require_once(__DIR__ . "./../helpers/warning2error.php");
require_once(__DIR__ . "./../helpers/logger.php");
require_once(__DIR__ . "./../helpers/redirect.php");

function deleteAccount($id)
{
    utilisateur::delete($id);
    if (db::getInstance()->hasError())
    {
        redirect::to("gererUser", "Erreur, impossible de supprimer l'utilsateur");
    }
    else
    {
        redirect::to("gererUser", "Utilisateur supprimé");
    }
}

function removeAccount($id)
{
    utilisateur::delete($id);
    if (db::getInstance()->hasError())
    {
        redirect::to("profil", "Erreur, impossible de supprimer l'utilsateur");
    }
    else
    {
        disconnect();
    }
}

function editAccount($id, $nNom, $nPrenom, $nEmail, $nPassword, $oPassword)
{
    $user = utilisateur::load($id);
    if (!empty($user) && password_verify($oPassword, $user->get("passwordHash")))
    {
        $params =
            [
                "nom" => $nNom,
                "prenom"=>$nPrenom,
                "email"=>$nEmail,
                "passwordhash"=>password_hash($nPassword, PASSWORD_BCRYPT),
                "usericon"=>$user->get("userIcon")
            ];
        db::getInstance()->update("utilisateurs", "id = {$id}", $params);

        if ($user->get("admin") == true && !db::getInstance()->hasError())
            redirect::to("profilAdmin", "Informations modifiées");
        else if ($user->get("admin") == false && !db::getInstance()->hasError())
            redirect::to("profil", "Informations modifiées");
        else
            redirect::to("profil", "Une erreur s'est produite");
    }
    else
    {
        redirect::to("accueil", "Paramètres invalides");
    }
}

function disconnect()
{
    unset($_SESSION["userID"]);
    unset($_SESSION["admin"]);
    //echo "déconnecté";
    redirect::to("accueil");
}

function createAccount($nom, $prenom, $email, $pHash)
{
    $user = new utilisateur(0, $nom, $prenom, $email, $pHash, "", false);

    try{
        $icon = saveUserIcon();
        $user->set("userIcon", $icon);
    }catch(Exception $e)
    {
        $user->set("userIcon", utilisateur::$defaultIcon);
        //logger::log($e->getMessage());
    }

    utilisateur::save($user);

    if (!db::getInstance()->hasError())
    {
        //echo "inscription valide";
        redirect::to("profil");
    }
    else
    {
        echo "inscription invalide <br/>" ;
        deleteUserIcon($icon);
        redirect::to("inscription", "Identifiants invalides !");
    }
}

function login($email, $password)
{
    try {
        $hash = db::getInstance()->call("SELECT passwordhash", "utilisateurs", "email = {$email}")["passwordhash"];
    }catch(Exception $e)
    {
        //logger::log($e->getMessage());
    }


    if (!empty($hash) && !db::getInstance()->hasError() && password_verify($password, $hash))
    {
        $id = db::getInstance()->call("SELECT id", "utilisateurs", "email = {$email}")["id"];
        $user = utilisateur::load($id);
        $_SESSION["userID"] = $user->get("id");
        $_SESSION["admin"] = $user->get("admin");

        //echo "bienvenue";
        if ($user->get("admin") == true)
            redirect::to("profilAdmin");
        else
            redirect::to("profil");
    }
    else
    {
        //echo "connexion invalide";
        redirect::to("connexion", "Identifiants invalides!");
    }
}