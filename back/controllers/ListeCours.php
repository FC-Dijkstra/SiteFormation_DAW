<?php
require_once(__DIR__ . "./../class/cours.php");
require_once(__DIR__ . "./../helpers/db.php");

function filtre($filtre) : array
{
	$array = db::getInstance()->get("cours","categorie = $filtre");
	return $array;
}

function coursSuivi($user) : array
{
	$res = array();
	$utilisateur = db::getInstance()->get("utilisateurs","nom = $user");
	$abo = db::getInstance()->get("abonnements","user = {$utilisateur->id}");
	for($i = 0;$i < count($abo);$i++)
	{
		$cours = db::getInstance()->get("cours","id = {$abo[$i]->cours}");
		$res = $res + $cours;
	}
	return $res;
	//return db::getInstance()->get("utilisateurs u,cours c,abonnements a","u.nom = $user AND u.id = a.user AND a.cours = c.id");
}

function coursCree($user) : array
{
	$utilisateur = db::getInstance()->get("utilisateurs","nom = $user");
	$cours = db::getInstance()->get("cours","auteur = {$utilisateur->id}");
	return $cours;
	//return db::getInstance()->get("utilisateurs u,cours c","u.nom = $user AND u.id = a.auteur");
}

?>