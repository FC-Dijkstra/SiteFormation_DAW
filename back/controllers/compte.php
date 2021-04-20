<?php
require_once(__DIR__ . "./../class/utilisateur.php");
require_once(__DIR__ . "./../helpers/print.php");
require_once(__DIR__ . "./../helpers/warning2error.php");
require_once(__DIR__ . "./../helpers/logger.php");

//TODO: Suppression et modification de compte.

function deleteAccount($id)
{
    utilisateur::delete($id);
}

function editAccount($id, $nNom, $nPrenom, $nEmail, $nPassword)
{
    $params =
        [
            "nom" => $nNom,
            "prenom"=>$nPrenom,
            "email"=>$nEmail,
            "passwordhash"=>$nPassword
        ];
    db::getInstance()->update("utilisateurs", "id = {$id}", $params);
    redirect::to("PagePersoUser.php");
}

function disconnect()
{
    unset($_SESSION["userID"]);
    unset($_SESSION["admin"]);
    echo "déconnecté";
    //redirect::to("accueilFront.php");
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
        echo "inscription valide <br/>";
        //redirect::to("homeUser.php");
    }
    else
    {
        echo "inscription invalide <br/>" ;
        deleteUserIcon($icon);
        //redirect::to("accueil.php");
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

        echo "bienvenue";
        //redirect::to("PagePersoUser.php");
    }
    else
    {
        echo "connexion invalide";
        //redirect::to("PageConnexion.php");
    }
}