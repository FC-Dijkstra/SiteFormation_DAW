<?php
require_once(__DIR__ . "./../class/utilisateur.php");

function createAccount($nom, $prenom, $email, $password)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $pHash = password_hash($password, PASSWORD_BCRYPT);
        $user = new utilisateur(0, $nom, $prenom, $email, $pHash, false);

        utilisateur::save($user);

        if (!db::getInstance()->hasError())
        {
            //redirection vers page de connexion front.
        }
        else
        {
            echo "inscription invalide <br/>" ;
        }
    }
}

function login($email, $password)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $hash = db::getInstance()->call("SELECT user_password", "utilisateurs", "email = {$email}")->user_password;

        if (!db::getInstance()->hasError() && password_verify($password, $hash))
        {
            echo "attempt to load user <br/>";
            $id = db::getInstance()->call("SELECT id", "utilisateurs", "email = {$email}")->id;
            $user = utilisateur::load($id);
            $_SESSION["userID"] = $user->get("id");
            $_SESSION["admin"] = $user->get("admin");

            echo $_SESSION["userID"];
            echo $_SESSION["admin"];
        }
        else
        {
            echo "erreur 2";
        }
    }
    else
    {
        echo "erreur 1";
    }
}