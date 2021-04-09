<?php
session_start();
require_once(__DIR__ . "./../class/utilisateur.php");

function createAccount($nom, $prenom, $email, $password)
{
    $pHash = password_hash($password, PASSWORD_BCRYPT);
    $user = new utilisateur(0, $nom, $prenom, $email, $pHash, false);

    utilisateur::save($user);

    if (!db::getInstance()->hasError())
    {
        echo "no error";
    }
    else
    {
        echo "error";
    }
}

function login($email, $password)
{
    $pHash = password_hash($password, PASSWORD_BCRYPT);

}