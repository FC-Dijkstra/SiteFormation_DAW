<?php
require_once(__DIR__ . "./DBObject.php");
class message extends DBObject
{

    protected int $id;
    protected int $conversation;
    protected string $contenu;
    protected int $auteur;
    protected $date;


    public function __construct(int $id, int $conversation, string $contenu, int $auteur, $date)
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
            $params[0]->id,
            $params[0]->conversation,
            $params[0]->contenu,
            $params[0]->auteur,
            $params[0]->date
        );
    }
    public static function save($instance)
    {
        $params =
            [
                "id" => $instance->id,
                "conversation" => $instance->conversation,
                "contenu" => $instance->contenu,
                "auteur" => $instance->auteur,
                "date" => $instance->date
            ];
        db::getInstance()->insert("messages", $params);
    }

    public static function getAll()
    {
        $dbValues = db::getInstance()->getAll("messages");
        $output = array();

        for ($i = 0; $i < count($dbValues); $i++)
        {
            $message = new message(
                $dbValues[$i]->id,
                $dbValues[$i]->conversation,
                $dbValues[$i]->contenu,
                $dbValues[$i]->auteur,
                $dbValues[$i]->date
            );

            array_push($output,$message);
        }

        return $output;
    }
}
