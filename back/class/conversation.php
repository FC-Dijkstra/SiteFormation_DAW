<?php
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");
require_once(__DIR__ . "./../helpers/db.php");
class conversation extends DBObject
{

    protected int $id;
    protected string $titre;
    protected int $categorie;
    protected int $locked;


    public function __construct(int $id, int $categorie, string $titre, int $locked)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->categorie = $categorie;
        $this->locked = $locked;
    }


    public static function load($id)
    {
        $params = db::getInstance()->getID(config::$CONV_TABLE, $id);
        return new conversation(
            $params["id"],
            $params["categorie"],
            $params["titre"],
            $params["locked"]
        );
    }

    public static function delete($id)
    {
        //TODO: suppression fichiers dans data/cours
        return db::getInstance()->delete(config::$CONV_TABLE, $id);
    }
    public static function save($instance)
    {

        $param =
            [
                "id" => $instance->id,
                "categorie" => $instance->categorie,
                "titre" => $instance->titre,
                "locked" => $instance->locked
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
                $dbValues[$i]["locked"]
            );

            array_push($output, $conversation);
        }

        return $output;
    }
}
