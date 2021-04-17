<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/web.css" type="text/css"/>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/back/class/cours.php");
$liste = array();
array_push($liste, new cours(1, "Apprenez HTML", 1, "", -1, 1));
array_push($liste, new cours(2, "Allez plus loin avec HTML", 1, "", -1, 1));
array_push($liste, new cours(3, "Apprenez CSS", 3, "", -1, 2));
array_push($liste, new cours(4, "Apprenez JS", 1, "", -1, 3));
?>

    <?php include ('../../Header_Footer/header.php') ?>

    <body>
    <div class="search">
        <input type="text" id="searchBox" placeholder="Recherche..."/>
    </div>
        <div class="html">
            <h4 class="langage">HTML</h4>
            <div id="html_cours">

            </div>
        </div>
        <div class="CSS">
            <h4 class="langage">CSS</h4>
            <div id="css_cours">

            </div>
        </div>
        <div class="JS">
            <h4 class="langage">JAVASCRIPT</h4>
            <div id="js_cours">

            </div>
        </div>
    <script src="/front/JS/Liste_Cours.js" type="text/javascript"></script>
    <script type="text/javascript">
        let cours = <?php echo json_encode($liste); ?>;
        updateCours(cours);
    </script>
    </body>
    <?php include ('../../Header_Footer/footer.php') ?>
</html>
