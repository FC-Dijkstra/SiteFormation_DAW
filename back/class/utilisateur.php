<?php

class utilisateur extends DBObject
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private bool $admin;        //? booléen pour les droits admin
    private array $followed;    //? array pour les cours suivis
    private array $results;     //? résultats obtenus lors de l'évaluation

    public function __construct(string $nom, string $prenom, string $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public static function load($id)
    {
        $params = db::getInstance()->get("utilisateurs", "id = {$id}");
        echo $params;
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
        $this->password = password_hash($value, PASSWORD_BCRYPT);
    }
}
