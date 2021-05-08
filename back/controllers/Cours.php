<?php
require_once(__DIR__ . "./../class/cours.php");
require_once(__DIR__ . "./../class/categorie.php");
require_once(__DIR__ . "./../helpers/db.php");

function deleteCours($id)
{
    deleteCoursFile($id);
    cours::delete($id);
    redirect::to("profilAdmin");
}