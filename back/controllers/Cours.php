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

function saveCours()
{
	if(isset($_POST['repCours']))
	{
		$cours = $_POST['repCours'];
		$c = db::instance()->query("SELECT * FROM cours ORDER BY id desc")[0];
		$lastID = $c['id'];
		$lastID--;
		mkdir("/back/data/cours/$lastID");
	
		$f = fopen("/back/data/cours/$lastID/index.html");
		fputs($f,$cours);
		fclose($f);
		
	}
}