<?php 
	require_once(__DIR__ . "./../helpers/db.php");
	
function RecupMsg($conv) //recup tous les messages a partir d'une conv
{
    return db::getInstance()->get(config::$MES_TABLE, "$conv = conversations", true);
}

 
function RecupConv($type)
{
    $res = array();
    $categorie = categorie::getAllByType($type);
    for ($i =0; $i< count ($categorie); $i++)
    {
        $rescat = $categorie[$i]["id"];
		$res = $res + db::getInstance()->get(config::$CONV_TABLE,"categorie = $rescat", false);
    }
    return $res;
}

function RecupConvById($id)
{
    return db::getInstance()->get(config::$CONV_TABLE,"categorie = $id",false);
}

function recup1Conv($id)
{
    //return db::getInstance()->get(config::$CONV_TABLE, "id = $id", true);
    return db::getInstance()->getID(config::$CONV_TABLE, $id);
}

function recupAuthor($id)
{
    //return db::getInstance()->get(config::$USER_TABLE, "id = $id", true);
    return db::getInstance()->getID(config::$USER_TABLE, $id);
}

function recupMessages($id)
{
    return db::getInstance()->query("SELECT * FROM messages WHERE conversation = ? ORDER BY date", [$id]);
}

//Recup toutes les conv dans une seul catégorie 
