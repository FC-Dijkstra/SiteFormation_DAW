<?php
	require_once("./../helpers/db.php");
	class Cours extends DBObject{
		
		private int $id;
		private string $nom;
		// difficulte = (Debutant, Intermediaire, Avance, Expert)
		private string $difficulte;
		private int $auteur;
		private int $categorie;
		private $db = null;
		
		public function __construct(string $id, string $nom,
									string $difficulte, int $auteur,
									int $categorie)
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->difficulte = $difficulte;
			$this->auteur = $auteur;
			$this->categorie = $categorie;
			
		}
		
		public function static load($ID)
		{
			if($db == null)
				$db = db::getInstance();
			$instance = db->get("Cours","id = $ID");
			$this->id = $instance->id;
			$this->nom = $instance->nom;
			$this->difficulte = $instance->difficulte;
			$this->auteur = $instance->auteur;
			$this->categorie = $instance->categorie;
		}
		
		public function static save($instance)
		{
			if($db == null)
				$db = db::getInstance();
			db->insert("Cours",["id" => "$instance->id",
								"nom" => "$instance->nom", 
								"difficulte" => "$instance->difficulte", 
								"auteur" => "$instance->auteur", 
								"categorie" => "$instance->	categorie"]);
			
		}
			
	}
?>