<?php
require_once(__DIR__ . "./../class/utilisateur.php");
require_once(__DIR__ . "./../helpers/print.php");


function createAccount($nom, $prenom, $email, $password, $admin = false)
{
    $pHash = password_hash($password, PASSWORD_BCRYPT);
    $user = new utilisateur(0, $nom, $prenom, $email, $pHash, false);

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
        //redirection vers page de connexion front.
    }
    else
    {
        echo "inscription invalide <br/>" ;
    }
}

function login($email, $password)
{
    $hash = db::getInstance()->call("SELECT user_password", "utilisateurs", "email = {$email}")->user_password;

    if (!db::getInstance()->hasError() && password_verify($password, $hash))
    {
        $id = db::getInstance()->call("SELECT id", "utilisateurs", "email = {$email}")->id;
        $user = utilisateur::load($id);
        $_SESSION["userID"] = $user->get("id");
        $_SESSION["admin"] = $user->get("admin");
    }
    else
    {
        echo "connexion invalide";
    }
}