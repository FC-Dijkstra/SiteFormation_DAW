<?php
require("../helpers/db.php");

$db = db::getInstance();
//$db->insert("test", ["nom" => "IAN", "prenom" => "TRUE", "age" => "20"]);
$db->get("test", "nom = IAN");
