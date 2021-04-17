<?php
require_once(__DIR__ . "./../class/utilisateur.php");
require_once(__DIR__ . "./../helpers/print.php");
require_once(__DIR__ . "./../helpers/warning2error.php");
require_once(__DIR__ . "./../helpers/logger.php");

//TODO: Suppression et modification de compte.

function deleteAccount($id)
{

}

function editAccount()
{

}

function disconnect()
{

}

function createAccount($nom, $prenom, $email, $password, $userIcon, $admin = false)
{
    $pHash = password_hash($password, PASSWORD_BCRYPT);
    //TODO: ajouter enregistrement d'image.
    $user = new utilisateur(0, $nom, $prenom, $email, $pHash, $userIcon, false);

    if ($admin)
    {
        utilisateur::saveAdmin($user);
    }
    else
    {
        utilisateur::save($user);
    }


    if (!db::getInstance()->hasError())
    {
        echo "inscription valide <br/>";
        //redirect::to("homeUser.php");
    }
    else
    {
        echo "inscription invalide <br/>" ;
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
    }
    else
    {
        echo "connexion invalide";
    }
}