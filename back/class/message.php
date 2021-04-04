<?php
require_once("DBObject.php");
class Message extends DBObject
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
        $params = db::getInstance()->get("message", "id ={$id}");
        echo $params;
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
}
