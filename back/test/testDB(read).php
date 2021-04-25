<?php
require(__DIR__ . "./../helpers/db.php");
require(__DIR__ . "./../class/utilisateur.php");
require(__DIR__ . "./../class/message.php");
require(__DIR__ . "./../class/categorie.php");
require(__DIR__ . "./../class/conversation.php");
require(__DIR__ . "./../class/cours.php");
require(__DIR__ . "./../helpers/print.php");

//! TESTS POUR LECTURE

//* tests pour utilisateur.config php
$user = utilisateur::load(1);
println();
var_dump($user);
println();
$users = utilisateur::getAll();
println();
var_dump($users);
println();


//* tests pour message.config php
$message = message::load(1);
println();
var_dump($message);

//* tests pour cours.config php
$cours = cours::load(1);
println();
var_dump($cours);
println();
$allCours = cours::getAll();


//* tests pour categorie.config php
$categorie = categorie::load(1);
println();
var_dump($categorie);

//* tests pour conversation.config php
$conversation = conversation::load(1);
println();
var_dump($conversation);

