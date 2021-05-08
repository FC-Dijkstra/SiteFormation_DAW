<?php
    require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/QCM.php");
?>

<link rel="stylesheet" href="/front/CSS/Quizz/accueil_qcm.css" type="text/css"/>
<body class="light">
    <div id="centre">
    <h3 id="bvn"> Choisis la catégorie et teste tes connaissances ! </h3>
    <div id="line0"><hr></div>
    <div id="qcm">
    <p id="web"> Développement web </p>
    <div id="line1"><hr></div><br/>
        <?php
            listQCM();
        ?>
    <p id="app"> Développement d'applications </p>
    <div id="line1"><hr></div>
</body>
