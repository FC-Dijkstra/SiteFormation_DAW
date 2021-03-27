<?php

//* AUCUN attribut dans le fichier XML. Que des éléments.
$xml = simplexml_load_file("../XML/reponses.xml");
$json = json_encode($xml);
echo $json;
