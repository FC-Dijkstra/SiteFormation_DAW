<?php
include_once("../Header_Footer/header.php");
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
    <p>Nous vous proposons différentes catégories de cours<br/><br/><br/></p>
    <div id="coursDiv">
    <div class="slide-cours" onclick="window.location.href='./Cours/web.php'">
        <img src="../IMG/DevWeb.PNG">
    </div>
    <div class="slide-cours" onclick="window.location.href='./Cours/application.php'">
        <img src="../IMG/DevApplication.PNG">
    </div>
    </div>
</div>

<div id="description">
    <img src="../IMG/cours.PNG">
    <p>
      Nous avons différents professeurs qui vous donnent des cours. Passez un quizz pour voir votre niveau, puis accéder ensuite aux cours qui vous plaisent ! Chaque jours, nous postons de nouveaux cours avec des professeurs différents. 
    </p>
</div>

<div id="description2">
    <img src="../IMG/coursOrdi.PNG">
    <span>
      Apprenez différents langages de programmation (web, application...) gratuitement !
      Nous nous efforçons à vous proposez un contenu ludique, complet et formateur.
    </span>
</div>
<script type="text/javascript" src="../JS/Cours.js"></script>

<?php
include('../Header_Footer/footer.php');
?>

</html>
