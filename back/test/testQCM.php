<?php

require_once (__DIR__ . "./../controllers/QCM.php");

$json = '{
    "meta": {
        "id": "1"
    },
    "reponse": {
        "id": "1",
        "value": "a"
    }
}';

//validateReponses(2, $json);

getQCM(2);