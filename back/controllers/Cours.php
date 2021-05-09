<?php
require_once(__DIR__ . "./../class/cours.php");
require_once(__DIR__ . "./../class/categorie.php");
require_once(__DIR__ . "./../helpers/db.php");
require_once (__DIR__ . "./../helpers/warning2error.php");

function deleteCours($id)
{
    try{
        deleteCoursFile($id);
        cours::delete($id);
        redirect::to("profilAdmin", "Cours supprimé");
    }
    catch(Exception $e)
    {
        logger::log("Erreur pendant la suppression du cours {$id}");
        redirect::to("profilAdmin", "Erreur, impossible de supprimer le cours");
    }
}

function saveCoursFold()
{
	if(isset($_POST['repCours']))
	{
		$cours = $_POST['repCours'];
		$c = db::getInstance()->query("SELECT * FROM cours ORDER BY id desc")[0];
		$lastID = $c['id'];
		$lastID++;
		$difficulte = "Débutant";
		switch(rand(1,4))
		{
			case 1 : $difficulte = "Débutant";break;
			case 2 : $difficulte = "Intermédiaire";break;
			case 3 : $difficulte = "Avancé";break;
			case 4 : $difficulte = "Expert";break;
		}
		if(!file_exists(__DIR__ . "./../data/cours/$lastID/index.html"))
		{
			$tabcours = json_decode($cours);
			$exp = explode(">",$tabcours[1]);
			echo $exp[1];
			$exp = explode("<",$exp[1]);
			echo $exp[0];
			$titre = $exp[0];
			mkdir(__DIR__ . "./../data/cours/$lastID");
			$f = fopen(__DIR__ . "./../data/cours/$lastID/index.html","w+");
			for($i = 0;$i < count($tabcours);$i++)
			{
				fputs($f,$tabcours[$i]."\n");
			}
			fclose($f);
			$params = [
			"nom"=>$titre,
			"difficulte"=>$difficulte,
			"auteur"=>$_SESSION["admin"],
			"categorie"=>rand(1,3)
			];
			db::getInstance()->insert(config::$COURS_TABLE, $params);
		}
		
	}
	
}