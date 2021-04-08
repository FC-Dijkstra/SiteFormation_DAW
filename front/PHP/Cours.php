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
    <div class="slide-cours" onclick="window.location.href='#'">
        <h2>Vive le HTML</h2>
        <p>
            C'est pas un langage de programmation mais t'as pas le choix
        </p>
    </div>
    <div class="slide-cours" onclick="window.location.href='#'">
        <h2>CSS</h2>
        <p>
            Développez votre envie de vous suicider, jamais ce que vous ferez ne fonctionnera comme vous le voudrez
        </p>
    </div>
    <div class="slide-cours" onclick="window.location.href='#'">
        <h2>JavaScript</h2>
        <p>
            C'est sympa quand tu comprends comment ça marche
        </p>
    </div>
</div>
<script type="text/javascript" src="../JS/Cours.js"></script>
</body>
</html>