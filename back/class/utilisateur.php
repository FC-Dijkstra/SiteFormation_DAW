<?php
require_once(__DIR__  . "./../helpers/db.php");
require_once(__DIR__ . "./DBObject.php");

class utilisateur extends DBObject
{
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $passwordHash;
    protected bool $admin;        //? booléen pour les droits admin

    public function __construct($id, $nom, $prenom, $email, $passwordHash, $admin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->admin = $admin;
    }

    public static function load($id)
    {
        $params = db::getInstance()->getID("utilisateurs", $id);
        $admin = db::getInstance()->get("admin", "user = {$id}");

        return new utilisateur(
            $params[0]->id,
            $params[0]->nom,
            $params[0]->prenom,
            $params[0]->email,
            $params[0]->passwordHash,
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
                "user_password" => $instance->passwordHash
            ];
        db::getInstance()->insert("utilisateurs", $params);
    }
}
