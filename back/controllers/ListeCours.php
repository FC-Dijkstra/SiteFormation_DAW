<?php
require_once("./../class/cours.php");
require_once("./../helpers/db.php");

function filtre($filtre) : array
{
	$array = //getAllCours;
	$arrayRes;
	for(let i = 0;i < $array.count(); i++)
	{
		if(str_contains($array[i]->get("nom"),$filtre))
		{
			array_push($arrayRes,$array[i]);
		}
	}
	return $arrayRes;
}

function coursSuivi($user) : array
{
	$res = array();
	$utilisateur = db::getInstance()->get("utilisateurs","nom = $user");
	$abo = db::getInstance()->get("abonnements","user = $utilisateur[0]->id");
	for(let i = 0;i < $abo.count();i++)
	{
		$cours = db::getInstance()->get("cours","id = $abo[i]->cours");
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