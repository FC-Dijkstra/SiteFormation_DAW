<?php 
	// ./../data/fichier.html
	require_once(__DIR__ . "./../class/cours.php");
	require_once(__DIR__ . "./../class/categorie.php");
	require_once(__DIR__ . "./../helpers/db.php");
	
	function verifFichier($id)
	{
		if(file_exists(__DIR__ ."./../data/cours/$id/index.html"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	
	function createView($array,$sommaire)
	{
		
		$liste = array();
		$partiC = array();
		$liste[0] = "<body class='light' onload='setFollowValue()'> <div id='progress'></div>";
		$liste[1] = "<h3 id='bvn'> $array[0] </h3>";
		$liste[2] = "<button id='abonnement' type='button' value='S\'abonner' onclick='AboDesabo()'>S'abonner</button>";
		$liste[3] = "<div id='line0'><hr></div>";
		$liste[4] = "<div id='apprendre'> <p id='titre'> Ce que vous allez apprendre : </p> <p>$array[1]</p> </div>";
		$liste[5] = "<div id='sommaire'> <h3> Sommaire : </h3>";
		$indice = 5;
		$n_chapitre = "0";
		$n_section = "0";
		for($i=0;$i < count($sommaire) ; $i++)
		{
			if(str_contains($sommaire[$i],"Chapitre"))
			{
				$chapitre = explode($sommaire[$i]);
				$n_chapitre = $chapitre[1];
				if($chapitre[1] != "1")
				{
					$liste[$i+5] += "</ul> </ul>";
				}
				$liste[$i+6] = "<ul class='m_Chapitre' id='Chapitre_$chapitre[1]'>";
				$liste[$i+6] += "<a onclick='afficherMasquer(\"listeChapitre$string[1]\")'><li>$sommaire[$i]</li></a>";
				$liste[$i+6] += "<ul id='listeChapitre$chapitre[1]' class='m_Section' style='display: none;'>";
			}
			else
			{
				$section = explode($sommaire[$i]);
				$n_section = $section[1];
				array_push($partiC[$n_chapitre][$n_section],"$sommaire[i]");
				$liste[$i+6] = "<li class='liste'><a href='#Chapitre".$n_chapitre."_Section$n_section'>Section$section[1]</a></li>";
			}
			if($i == count($sommaire)-1)
			{
				$liste[$i+6] += "</ul> </ul>";
				$indice = $i+2;
			}
		}
		$liste[$indice] = "</div> <div id='Cours'>";
		$indice = $indice+1;
		$n_section = 0;
		for($i = 0; $i < count($partieC); $i++)
		{
			$iC = $i+1;
			
			$liste[$indice] = "<h1 class='Chapitre' id='Chapitre$iC'>".$array[$i+2*$n_section+2]."</h1>";
			
			$indice = $indice++;
			for($j = 1;$j <= count($partieC["$i"]);$j++)
			{
				$liste[$indice] = "<h2 class='Section' id='Chapitre".$iC."_Section$j'>".$array[$i+2*$n_section+2+$j+($j-1))]."</h2>"
				$liste[$indice] += "<p>".$array[$i+2*$n_section+3+$j+($j-1)]."</p>"
				$indice++;
			}
			$n_section += count($partieC["$iC"]);
		}
		$liste[$indice] = "</div> </body>";
		
		var_dump($liste);
	}
	
	function returnView($id)
	{
		$flag = false;
		$res = array();
		$indice = 0;
		if(verifFichier($id))
		{
			
			$coursfile = fopen(__DIR__ . "./../data/cours/$id/index.html","r");
			while(!feof($coursfile))
			{
				$ligne = fgets($coursfile);
				if(str_contains($ligne,"<body"))
				{
					$flag = true;
				}
				if(str_contains($ligne,"</body"))
				{
					$flag = false;
				}
				if($flag)
				{
					$res[$indice] = $ligne;
					$indice++;
				}
			}
		}
		else
		{
			throw new ErrorException("Fichier non trouvé");
		}
		return $res;
	}
	
	function getByCategorie($type)
	{
		$res = array();
		$categorie = categorie::getAllByType($type);
		for($i = 0; $i < count($categorie);$i++)
		{
			$rescat = $categorie[$i]["id"];
			array_push($res,db::getInstance()->get("cours","categorie = $rescat",false));
		}
		if(count($res)>0)
			return $res;
		else
			return null;
	}

function isFollowing($cours)
{
    if (isset($_SESSION["userID"]) && isset($cours))
    {
        $res = db::getInstance()->query("SELECT * FROM abonnements WHERE utilisateur = ? AND cours = ?", [$_SESSION["userID"], $cours]);
        if (!db::getInstance()->hasError() && count($res) != 0)
        {
            return true;
        }
        else return false;
    }
    else return false;
}
?>