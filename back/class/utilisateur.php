<?php
require_once(__DIR__  . "./../helpers/db.php");
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");

class utilisateur extends DBObject
{
    private static string $defaultIcon = "DEFAULT.png";
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $passwordHash;
    protected string $userIcon;
    protected bool $admin;        //? booléen pour les droits admin

    public function __construct(int $id, string $nom, string $prenom, string $email, string $passwordHash, string $userIcon, bool $admin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom =  $prenom;
        $this->email = $email;
        $this->passwordHash =  $passwordHash;
        $this->userIcon =  $userIcon == "" ? self::$defaultIcon : $userIcon;
        $this->admin = $admin;
    }

    public static function load($id)
    {
        $params = db::getInstance()->getID(config::$USER_TABLE, $id);
        $admin = db::getInstance()->get(config::$ADMIN_TABLE, "utilisateur = {$id}");

        return new utilisateur(
            $params["id"],
            $params["nom"],
            $params["prenom"],
            $params["email"],
            $params["passwordhash"],
            $params["usericon"],
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
                "passwordhash" => $instance->passwordHash,
                "usericon"=>$instance->userIcon
            ];
        db::getInstance()->insert(config::$USER_TABLE, $params);
    }

    public static function delete($id)
    {
        //TODO: supprimer fichiers résiduels dans data/userIcons
        return db::getInstance()->delete(config::$USER_TABLE, $id);
    }

    public static function saveAdmin($instance)
    {
        utilisateur::save($instance);
        db::getInstance()->insert(config::$ADMIN_TABLE, ["utilisateur" => $instance->id]);
    }

    public static function getAll()
    {
        $dbValues = db::getInstance()->getAll(config::$USER_TABLE);
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++) {
            $admin = db::getInstance()->get(config::$ADMIN_TABLE, "utilisateur = {$dbValues[$i]["id"]}");
            $user = new utilisateur(
                $dbValues[$i]["id"],
                $dbValues[$i]["nom"],
                $dbValues[$i]["prenom"],
                $dbValues[$i]["email"],
                $dbValues[$i]["passwordhash"],
                $dbValues[$i]["usericon"],
                !(count($admin) == 0)
            );

            array_push($output, $user);
        }
        return $output;
    }

}
