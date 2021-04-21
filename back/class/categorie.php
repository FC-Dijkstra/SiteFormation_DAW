<?php
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");

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
        $params = db::getInstance()->getID(config::$CAT_TABLE, $id);
        return new categorie(
            $params["id"],
            $params["titre"]
        );
    }
	
    public static function delete($id)
    {
        return db::getInstance()->delete(config::$CAT_TABLE, $id);
    }

    public static function save($instance)
    {

        $param =
            [
                "id" => $instance->id,
                "titre" => $instance->titre,
            ];
        db::getInstance()->insert(config::$CAT_TABLE, $param);
    }

    public static function getAll()
    {
        $dbValues = db::getInstance()->getAll(config::$CAT_TABLE);
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++)
        {
            $categorie = new categorie(
                $dbValues[$i]["id"],
                $dbValues[$i]["titre"]
            );

            array_push($output, $categorie);
        }

        return $output;
    }
	
	public static function getAllByType($type)
	{
		return db::getInstance()->query("SELECT * FROM categories WHERE titre LIKE '".$type."%'");
	}
}
