<?php
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");

class message extends DBObject
{

    protected int $id;
    protected int $conversation;
    protected string $contenu;
    protected int $auteur;
    protected $date;


    public function __construct(int $id, int $conversation, int $auteur, string $contenu, $date)
    {
        $this->id = $id;
        $this->conversation = $conversation;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
        $this->date = $date;
    }
    public static function load($id)
    {
        $params = db::getInstance()->getID("messages", $id);
        return new message(
            $params["id"],
            $params["conversation"],
            $params["auteur"],
            $params["contenu"],
            $params["date"]
        );
    }

    public static function delete($id)
    {
        return db::getInstance()->delete(config::$MES_TABLE, $id);
    }
    public static function save($instance)
    {
        $params =
            [
                "id" => $instance->id,
                "conversation" => $instance->conversation,
                "auteur" => $instance->auteur,
                "contenu" => $instance->contenu,
                "date" => $instance->date
            ];
        db::getInstance()->insert(config::$MES_TABLE, $params);
    }

    public static function getAll()
    {
        $dbValues = db::getInstance()->getAll(config::$MES_TABLE);
        $output = array();

        for ($i = 0; $i < count($dbValues); $i++)
        {
            $message = new message(
                $dbValues[$i]["id"],
                $dbValues[$i]["conversation"],
                $dbValues[$i]["auteur"],
                $dbValues[$i]["contenu"],
                $dbValues[$i]["date"]
            );

            array_push($output,$message);
        }

        return $output;
    }
}
