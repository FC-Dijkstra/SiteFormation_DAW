<?php 
class Message extends DBOject{

    private int $id;
    private int $conversation;
    private  string $contenu;
    private int $auteur;
    //private date $date;


    public function __construct(int $id, int $conversation, string $contenu, int $auteur, /*date $date*/ )
    {
        $this->id = $id;
        $this->conversation = $conversation;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
        //$this->date = $date;

    }
    public static function load($id){
        $params = db::getInstance()->get("message", "id ={$id}");
        echo $params;
    }
    public static function save($instance){
        
        $param = 
        [
            "id" => $instance->id,
            "conversation" => $instance->conversation,
            "contenu" => $instance->contenu,
            "auteur" => $instance->auteur,
        ];
        db::getInstance()->insert("conversation", $param); 

    }
}
