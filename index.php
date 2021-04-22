<?php
require_once("/back/helpers/token.php");
session_start();
token::generate();

if (isset($_SESSION["userID"]))
{
    include_once("/front/Include/header_connected.php");
}
else
{
    include_once("/front/Include/Header.php");
}

//table de routage vers les pages

include_once("/front/Include/Footer.php");
?>