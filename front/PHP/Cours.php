<?php
include_once("../Header_Footer/template.php");
?>
<link rel="stylesheet" href="../CSS/cours.css" type="text/css"/>
<div class="base-text">
    <h2>Une multitude de cours</h2>
    <p>
        Sur cette page, venez choisir vos cours : vous pouvez apprendre
        des langages web comme HTML, CSS ou Javascript mais également des langages logiciels comme Java ou C !
    </p>
</div>
<div id="cours">
    <div class="slide-cours" onclick="window.location.href='./web.php'">
        <h2>Développement Web</h2>
        <p>
            Cassez vous la tête en essayant de créer vous-même votre site internet. <br />
            Spoiler : Vous allez détester le CSS ♥
        </p>
    </div>
    <div class="slide-cours" onclick="window.location.href='./application.php'">
        <h2>Développement d'applications</h2>
        <p>
            Créez vos applications en apprenant un des cours dans cette catégorie.
        </p>
    </div>
</div>
<script type="text/javascript" src="../JS/Cours.js"></script>
<?php
include('../Header_Footer/footer.php');
?>

</html>