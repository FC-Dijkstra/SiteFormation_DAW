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
        $this->id = (int) $id;
        $this->nom = (string) $nom;
        $this->prenom = (string) $prenom;
        $this->email = (string) $email;
        $this->passwordHash = (string) $passwordHash;
        $this->admin = (bool) $admin;
    }

    public static function load($id)
    {
        $params = db::getInstance()->getID("utilisateurs", $id);
        $admin = db::getInstance()->get("admin", "user = {$id}");

        return new utilisateur(
            $params->id,
            $params->nom,
            $params->prenom,
            $params->email,
            $params->user_password,
            $admin
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

    public static function getAll()
    {
        $dbValues = db::getInstance()->getAll("utilisateurs");
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++) {
            $admin = db::getInstance()->get("admin", "user = {$dbValues[$i]->id}");
            $user = new utilisateur(
                $dbValues[$i]->id,
                $dbValues[$i]->nom,
                $dbValues[$i]->prenom,
                $dbValues[$i]->email,
                $dbValues[$i]->user_password,
                count($admin) == 0 ? false : true
            );

            array_push($output, $user);
        }

        return $output;
    }

}
