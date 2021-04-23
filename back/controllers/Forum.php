<?php 

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

function Recup1Conv($id)
{
    return db::getInstance()->get(config::$CONV_TABLE, "$id = id", true);

}

//Recup toutes les conv dans une seul catégorie 
