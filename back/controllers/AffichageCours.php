<?php 
	// ./../data/fichier.html
	require_once(__DIR__ . "./../class/cours.php");
	require_once(__DIR__ . "./../class/categorie.php");
	
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
	
	function returnView($id)
	{
		$cours = cours::load($id);
		$flag = false;
		$res = array();
		$indice = 0;
		if(verifFichier($cours["filedir"]))
		{
			$coursfile = fopen("./../data/".$cours['filedir'],"r");
			while(!feof($coursfile))
			{
				$ligne = fgets($coursfile);
				if(str_contains("<body",$ligne))
				{
					$flag = true;
				}
				if(str_contains("</body",$ligne))
				{
					$flag = false;
				}
				if(flag)
				{
					$res[$indice] = $ligne;
					$indice++;
				}
			}
		}
		else
		{
			die("Fichier non trouvé");
		}
		return $res;
	}
	
	function getByCategorie($type)
	{
		$res = array();
		$categorie = categorie::getAllByType($type);
		var_dump($categorie);
		for($i = 0; $i < count($categorie);$i++)
		{
			$rescat = $categorie[$i]["id"];
			array_push($res,db::getInstance()->get("cours","categorie = $rescat",false));
		}
		return $res;
	}
	
?>