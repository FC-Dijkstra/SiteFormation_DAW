<?php
require_once(__DIR__ . "./../helpers/db.php");
require_once(__DIR__ . "./DBObject.php");
require_once(__DIR__ . "./../helpers/config.php");

class cours extends DBObject implements JsonSerializable
{

	protected int $id;
	protected string $nom;
	protected string $difficulte;
	protected int $auteur;
	protected int $categorie;

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
		$params = db::getInstance()->getID(config::$COURS_TABLE, $ID);

		return new cours(
			$params["id"],
			$params["nom"],
			$params["difficulte"],
			$params["auteur"],
			$params["categorie"]
		);
	}
	

	public static function save($instance)
	{
		$params =
			[
				"nom" => $instance->nom,
				"difficulte" => $instance->difficulte,
				"auteur" => $instance->auteur,
				"categorie" => $instance->categorie
			];

		db::getInstance()->insert("cours", $params);
	}

	public static function delete($id)
    {
        //TODO: supprimer fichiers résiduels dans data/cours
        db::getInstance()->delete($id);
    }

	public static function getAll()
    {
        $dbValues = db::getInstance()->getAll("cours");
        $output = array();
        for ($i = 0; $i < count($dbValues); $i++)
        {
            $cours = new cours(
                $dbValues[$i]["id"],
                $dbValues[$i]["nom"],
                $dbValues[$i]["difficulte"],
                $dbValues[$i]["auteur"],
                $dbValues[$i]["categorie"]
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
            'difficulte'=>$this->difficulte,
            'auteur'=>$this->auteur,
            'categorie'=>$this->categorie
        );
    }
}
