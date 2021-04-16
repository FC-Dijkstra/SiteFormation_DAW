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
        Différents professeurs sont disponibles pour vous donner des cours. Passez un quizz pour évaluer votre niveau, puis accédez ensuite aux cours qui vous
        plaisent ! Chaque jour, nous postons de nouveaux cours pour permettre à chacun d'accéder à ce dont il a besoin.
    </p>
</div>

<div id="description2">
    <img src="../IMG/coursOrdi.PNG">
    <span>
        Différents professeurs sont disponibles pour vous donner des cours. Passez un quizz pour évaluer votre niveau, puis accédez ensuite aux cours qui vous
        plaisent ! Chaque jour, nous postons de nouveaux cours pour permettre à chacun d'accéder à ce dont il a besoin.
    </span>
</div>
<script type="text/javascript" src="../JS/Cours.js"></script>

<?php
include('../Header_Footer/footer.php');
?>

</html>