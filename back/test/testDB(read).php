<?php
require("../helpers/db.php");
require("../class/utilisateur.php");
require("../class/message.php");
require("../class/categorie.php");
require("../class/conversation.php");
require("../class/cours.php");
require("../helpers/print.php");

//! TESTS POUR LECTURE

//* tests pour utilisateur.php
$user = utilisateur::load(1);
println();
var_dump($user);

//* tests pour message.php
$message = message::load(1);
println();
var_dump($message);

//* tests pour cours.php
$cours = cours::load(1);
println();
var_dump($cours);

//* tests pour categorie.php
$categorie = categorie::load(1);
println();
var_dump($categorie);

//* tests pour conversation.php
$conversation = conversation::load(1);
println();
var_dump($conversation);
