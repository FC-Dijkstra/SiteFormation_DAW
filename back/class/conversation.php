<?php
require_once("DBObject.php");

class Conversation extends DBObject
{

    protected int $id;
    protected string $titre;
    protected int $categorie;


    public function __construct(int $id, string $titre, int $categorie)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->categorie = $categorie;
    }


    public static function load($id)
    {
        $params = db::getInstance()->get("conversation", "id ={$id}");
        echo $params;
    }
    public static function save($instance)
    {

        $param =
            [
                "id" => $instance->id,
                "titre" => $instance->titre,
                "categorie" => $instance->categorie,

            ];
        db::getInstance()->insert("conversations", $param);
    }
}
