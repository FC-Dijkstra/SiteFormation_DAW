<?php

function Recup($user)
{
   return db::getInstance()->get(config::$RES_TABLE, "$user = utilisateur", false ); // des qu'il croise utilisateur, il renvoit la db
} 


function ajout($passage, $evalutation, $note, $utilisateur)
{
    $params = 
    [
        "passage" => $passage,
        "evalutation" => $evalutation,
        "note" => $note,
        "utilisateur" => $utilisateur,
    ];
    db::getInstance()->insert(config::$RES_TABLE, $params);
}