<?php
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");
require_once(__DIR__ . "./../helpers/db.php");
class conversation extends DBObject
{

    protected int $id;
    protected string $titre;
    protected int $categorie;


    public function __construct(int $id, int $categorie, string $titre)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->categorie = $categorie;
    }


    public static function load($id)
    {
        $params = db::getInstance()->getID(config::$CONV_TABLE, $id);
        return new conversation(
            $params["id"],
            $params["categorie"],
            $params["titre"]
        );
    }

    public static function delete($id)
    {
        return db::getInstance()->delete(config::$CONV_TABLE, $id);
    }
    public static function save($instance)
    {

        $param =
            [
                "id" => $instance->id,
                "categorie" => $instance->categorie,
                "titre" => $instance->titre,

            ];
        db::getInstance()->insert(config::$CONV_TABLE, $param);
    }

    public static function getAll()
    {
        $dbValues =  db::getInstance()->getAll(config::$CONV_TABLE);
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++)
        {
            $conversation = new conversation(
                $dbValues[$i]["id"],
                $dbValues[$i]["categorie"],
                $dbValues[$i]["titre"],
            );

            array_push($output, $conversation);
        }

        return $output;
    }
}
