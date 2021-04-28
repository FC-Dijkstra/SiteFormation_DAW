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