<?php 

function RecupMsg($conv) //recup tous les messages a partir d'une conv
{
    return db::getInstance()->get(config::$MES_TABLE, "$conv = conversations", true);
}

 
function RecupConv($res)
{
    $id = 5;
    $res = db::getInstance()->query("SELECT * FROM conversations, categories WHERE ID = {$id}");
    var_dump($res);
    println();
}


//Recup toutes les conv dans une seul catégorie 
