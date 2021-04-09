<?php
require_once(__DIR__ . "./DBObject.php");

class conversation extends DBObject
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
        $params = db::getInstance()->getID("conversations", $id);
        return new conversation(
            $params[0]->id,
            $params[0]->titre,
            $params[0]->categorie
        );
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
