<?php
require_once("../helpers/db.php");
require_once("DBObject.php");

class utilisateur extends DBObject
{
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $passwordHash;
    protected bool $admin;        //? booléen pour les droits admin

    public function __construct($id, $nom, $prenom, $email, $admin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = null;
        $this->admin = $admin;
    }

    public static function load($id)
    {
        $params = db::getInstance()->get("utilisateurs", "id = {$id}");
        $admin = db::getInstance()->get("admin", "user = 1");

        return new utilisateur(
            $params[0]->id,
            $params[0]->nom,
            $params[0]->prenom,
            $params[0]->email,
            count($admin) == 0 ? false : true
        );
    }

    public static function save($instance)
    {
        $params =
            [
                "nom" => $instance->nom,
                "prenom" => $instance->prenom,
                "email" => $instance->email,
                "user_password" => $instance->password,
            ];
        db::getInstance()->insert("utilisateurs", $params);
    }

    public function setPassword($value)
    {
        $this->passwordHash = password_hash($value, PASSWORD_BCRYPT);
    }
}
