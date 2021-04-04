<?php 
class Categorie extends DBObject{

    private int $id;
    private string $titre;


    private function __construct(int $id, string $titre)
    {
        $this->id = $id;
        $this->titre = $titre;
    }

    public static function load($id){
        $params = db::getInstance()->get("categorie", "id ={$id}");
        echo $params;
    }
    public static function save($instance){

        $param = 
        [
            "id" => $instance->id,
            "titre" => $instance->titre,
        ];
        db::getInstance()->insert("conversation", $param); 
        
    }



}