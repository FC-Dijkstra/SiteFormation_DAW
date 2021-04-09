<!DOCTYPE html>
<html lang="fr" >
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/back/class/cours.php");
$liste = array();
array_push($liste, new cours(1, "Apprenez HTML", "EZ", -1, 1));
array_push($liste, new cours(2, "Allez plus loin avec HTML", "EZ", -1, 1));
array_push($liste, new cours(3, "Apprenez CSS", "WANNA KMS", -1, 2));
array_push($liste, new cours(4, "Apprenez JS", "EZ", -1, 3));
?>

    <?php include ('../../Header_Footer/template.php') ?>
    <body>
        test
    </body>
    <?php include ('../../Header_Footer/footer.php') ?>
</html>