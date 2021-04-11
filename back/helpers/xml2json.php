<?php

$xml = simplexml_load_file("../evaluation/reponses.xml");
$json = json_encode($xml);
var_dump($json);