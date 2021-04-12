<!DOCTYPE html>
<link rel="stylesheet" href="../../CSS/web.css" type="text/css"/>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/back/class/cours.php");
include($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/header.php");

$liste = array();
array_push($liste, new cours(1, "Apprenez HTML", "EZ", -1, 1));
array_push($liste, new cours(2, "Allez plus loin avec HTML", "EZ", -1, 1));
array_push($liste, new cours(3, "Apprenez CSS", "WANNA KMS", -1, 2));
array_push($liste, new cours(4, "Apprenez JS", "EZ", -1, 3));

?>
 <body>
        <div class="html">
            <h4 class="langage">HTML</h4>
            <div class="cours">
                <img class="box1" src="/front/IMG/girl.png">
                <h3 class="box2"> Les bases du html</h3>
                <p class="box3">Facile ★✩✩ </p>
                <p class="box4"> Ceci est une description</p>
            </div>
        </div>
        <div class="CSS">
            <h4 class="langage">CSS</h4>
        </div>
        <div class="JS">
            <h4 class="langage">JAVASCRIPT</h4>
        </div>
        <div class="PHP">
            <h4 class="langage">PHP</h4>
        </div>
    </body>
<?php
include($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/footer.php");
