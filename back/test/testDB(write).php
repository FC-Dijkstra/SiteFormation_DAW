<?php
require(__DIR__ . "./../helpers/db.php");
require(__DIR__ . "./../class/utilisateur.php");
require(__DIR__ . "./../class/message.php");
require(__DIR__ . "./../class/categorie.php");
require(__DIR__ . "./../class/conversation.php");
require(__DIR__ . "./../class/cours.php");
require(__DIR__ . "./../helpers/print.php");

//! TESTS POUR ECRITURE
/*
//* tests pour db.config php
$db = db::getInstance();
$db->insert("test", ["nom" => "IAN", "prenom" => "TRUE", "age" => "20"]);
$db->get("test", "nom = IAN");
*/
/*
//* tests pour utilisateur.config php
$usr = new utilisateur(1, "IAN", "TRUE", "ian.trou@gmail.com", "aaa", false);
$usr->setPassword("aaa");
utilisateur::save($usr);

$usr2 = utilisateur::load("1");
println();
echo $usr2->get("id");
println();
echo $usr2->get("nom");
println();
echo $usr2->get("prenom");
println();
echo $usr2->get("email");
println();
printbool($usr2->get("admin"));
*/

/*
//* tests pour categorie
$categorie = new categorie(1, "categorie test");
categorie::save($categorie);
*/

/*
//*tests pour conversation
$conversation = new conversation(1, "conversation de test", 1);
conversation::save($conversation);
*/

/*
//* tests pour message.config php
$message = new message(1, 1, "message de test", 1, date("Y-m-d H:i:s"));
message::save($message);
*/

/*
//* tests pour cours
$cours = new cours(1, "cours de test", "Débutant", 1, 1);
cours::save($cours);
*/
