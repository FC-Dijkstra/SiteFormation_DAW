<?php 
	// ./../data/fichier.html
	require_once(__DIR__ . "./../class/cours.php");
	
	$filepath;
	function verifFichier($nom)
	{
		if(file_exists("./../data/$nom"))
		{
			$filepath = "./../data/$nom";
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function returnView($nom)
	{
		if(verifFichier($nom))
		{
			//retourner la vue du cours
		}
		else
		{
			//retourne erreur
		}
	}
	
?>