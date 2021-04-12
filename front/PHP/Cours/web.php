<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/web.css" type="text/css"/>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/back/class/cours.php");
$liste = array();
array_push($liste, new cours(1, "Apprenez HTML", 1, -1, 1));
array_push($liste, new cours(2, "Allez plus loin avec HTML", 1, -1, 1));
array_push($liste, new cours(3, "Apprenez CSS", 3, -1, 2));
array_push($liste, new cours(4, "Apprenez JS", 1, -1, 3));
?>

    <?php include ('../../Header_Footer/header.php') ?>


    <body>
        <div class="html">
            <h4 class="langage">HTML</h4>
            <?php
                foreach(array_filter($liste, function ($e){
                    return $e->get('categorie') == 1;
                }) as $cours){
            ?>
            <div class="cours">
                <img class="box1" src="/front/IMG/girl.png">
                <h3 class="box2"><?php echo $cours->get('nom') ?></h3>
                <p class="box3"><?php for($i=0;$i<3;$i++) echo $cours->get('difficulte')>$i?'★':'✩' ?></p>
                <p class="box4"> Ceci est une description</p>
            </div>
            <?php } ?>
        </div>
        <div class="CSS">
            <h4 class="langage">CSS</h4>
            <?php
            foreach(array_filter($liste, function ($e){
                return $e->get('categorie') == 2;
            }) as $cours){
                ?>
                <div class="cours">
                    <img class="box1" src="/front/IMG/girl.png">
                    <h3 class="box2"><?php echo $cours->get('nom') ?></h3>
                    <p class="box3"><?php for($i=0;$i<3;$i++) echo $cours->get('difficulte')>$i?'★':'✩' ?></p>
                    <p class="box4"> Ceci est une description</p>
                </div>
            <?php } ?>
        </div>
        <div class="JS">
            <h4 class="langage">JAVASCRIPT</h4>
            <?php
            foreach(array_filter($liste, function ($e){
                return $e->get('categorie') == 3;
            }) as $cours){
                ?>
                <div class="cours">
                    <img class="box1" src="/front/IMG/girl.png">
                    <h3 class="box2"><?php echo $cours->get('nom') ?></h3>
                    <p class="box3"><?php for($i=0;$i<3;$i++) echo $cours->get('difficulte')>$i?'★':'✩' ?></p>
                    <p class="box4"> Ceci est une description</p>
                </div>
            <?php } ?>
        </div>
        <div class="PHP">
            <h4 class="langage">PHP</h4>
            <?php
            foreach(array_filter($liste, function ($e){
                return $e->get('categorie') == 4;
            }) as $cours){
                ?>
                <div class="cours">
                    <img class="box1" src="/front/IMG/girl.png">
                    <h3 class="box2"><?php echo $cours->get('nom') ?></h3>
                    <p class="box3"><?php for($i=0;$i<3;$i++) echo $cours->get('difficulte')>$i?'★':'✩' ?></p>
                    <p class="box4"> Ceci est une description</p>
                </div>
            <?php } ?>
        </div>
    </body>
    <?php include ('../../Header_Footer/footer.php') ?>
</html>