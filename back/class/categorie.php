<?php
require_once("DBObject.php");
class categorie extends DBObject
{

    protected int $id;
    protected string $titre;


    public function __construct(int $id, string $titre)
    {
        $this->id = $id;
        $this->titre = $titre;
    }

    public static function load($id)
    {
        $params = db::getInstance()->getID("categories", $id);
        return new categorie(
            $params[0]->id,
            $params[0]->titre
        );
    }
    public static function save($instance)
    {

        $param =
            [
                "id" => $instance->id,
                "titre" => $instance->titre,
            ];
        db::getInstance()->insert("categories", $param);
    }
}
