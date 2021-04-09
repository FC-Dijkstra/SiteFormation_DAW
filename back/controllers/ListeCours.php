<?php
require_once("./../class/cours.php");
require_once("./../helpers/db.php");

function filtre($filtre) : array
{
	$array = db::getInstance()->get("cours","categorie = $filtre");
	return $array;
}

function coursSuivi($user) : array
{
	$res = array();
	$utilisateur = db::getInstance()->get("utilisateurs","nom = $user");
	$abo = db::getInstance()->get("abonnements","user = $utilisateur[0]->id");
	for($i = 0;$i < count($abo);$i++)
	{
		$cours = db::getInstance()->get("cours","id = $abo[$i]->cours");
		$res = $res + $cours;
	}
	return $cours;
	//return db::getInstance()->get("utilisateurs u,cours c,abonnements a","u.nom = $user AND u.id = a.user AND a.cours = c.id");
}

function coursCree($user) : array
{
	$utilisateur = db::getInstance()->get("utilisateurs","nom = $user");
	$cours = db::getInstance()->get("cours","auteur = $utilisateur[0]->id");
	return $cours;
	//return db::getInstance()->get("utilisateurs u,cours c","u.nom = $user AND u.id = a.auteur");
}

?>