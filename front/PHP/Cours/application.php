<!DOCTYPE html>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/back/class/cours.php");
include($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/template.php");

$liste = array();
array_push($liste, new cours(1, "Apprenez HTML", "EZ", -1, 1));
array_push($liste, new cours(2, "Allez plus loin avec HTML", "EZ", -1, 1));
array_push($liste, new cours(3, "Apprenez CSS", "WANNA KMS", -1, 2));
array_push($liste, new cours(4, "Apprenez JS", "EZ", -1, 3));

?>

<?php
include($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/footer.php");
