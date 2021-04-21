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
		$flag = false;
		$res = array();
		$indice = 0;
		if(verifFichier($nom))
		{
			$coursfile = fopen("./../data/$nom","r");
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
			die("Fichier non trouvé")
		}
		return $res;
	}
	
?>