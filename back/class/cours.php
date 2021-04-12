<?php
require_once(__DIR__ . "./../helpers/db.php");
require_once(__DIR__ . "./DBObject.php");

class cours extends DBObject implements JsonSerializable
{

	protected int $id;
	protected string $nom;
	// difficulte = (Debutant, Intermediaire, Avance, Expert)
	protected string $difficulte;
	protected int $auteur;
	protected int $categorie;
	//protected $db = null;

	public function __construct(int $id, string $nom, string $difficulte, int $auteur, int $categorie)
	{
		$this->id = $id;
		$this->nom = $nom;
		$this->difficulte = $difficulte;
		$this->auteur = $auteur;
		$this->categorie = $categorie;
	}

	public static function load($ID)
	{
		/*
		if ($db == null)
			$db = db::getInstance();
		$instance = db->get("Cours", "id = $ID");
		$this->id = $instance->id;
		$this->nom = $instance->nom;
		$this->difficulte = $instance->difficulte;
		$this->auteur = $instance->auteur;
		$this->categorie = $instance->categorie;
		*/

		$params = db::getInstance()->getID("cours", $ID);

		return new cours(
			$params[0]->id,
			$params[0]->nom,
			$params[0]->difficulte,
			$params[0]->auteur,
			$params[0]->categorie
		);
	}

	public static function save($instance)
	{
		/*
		if ($db == null)
			$db = db::getInstance();
		db->insert("Cours", [
			"id" => "$instance->id",
			"nom" => "$instance->nom",
			"difficulte" => "$instance->difficulte",
			"auteur" => "$instance->auteur",
			"categorie" => "$instance->	categorie"
		]);*/

		$params =
			[
				"nom" => $instance->nom,
				"difficulte" => $instance->difficulte,
				"auteur" => $instance->auteur,
				"categorie" => $instance->categorie
			];

		db::getInstance()->insert("cours", $params);
	}
	
	public static function getAll()
    {
        $dbValues = db::getInstance()->getAll("cours");
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++)
        {
            $cours = new cours(
                $dbValues[$i]->id,
                $dbValues[$i]->nom,
                $dbValues[$i]->difficulte,
                $dbValues[$i]->auteur,
                $dbValues[$i]->categorie
            );

            array_push($output, $cours);
        }

        return $output;
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return array(
            'id'=>$this->id,
            'nom'=>$this->nom,
            'difficulte'=>$this->categorie,
            'auteur'=>$this->auteur,
            'categorie'=>$this->categorie
        );
    }
}
