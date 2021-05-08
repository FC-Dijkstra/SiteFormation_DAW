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
            $qcms = listQCM()[0];
            foreach($qcms as $qcm)
            {
               $id = $qcm["id"];
                $nom = getQCMname($qcm["cours"]);
               include("template/QCM_liste.php");
            }
        ?>
    <p id="app"> Développement d'applications </p>
    <div id="line1"><hr></div>
    </div>
    </div>
</body>
