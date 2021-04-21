<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../../CSS/web.css" type="text/css"/>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/categorie.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/AffichageCours.php");

$liste = getByCategorie("Web");
$categories = categorie::getAllByType("Web");
?>

<?php include('../../Header_Footer/header.php') ?>

<body>
<div class="search">
    <input type="text" id="searchBox" placeholder="Recherche..."/>
</div>
<div class="cours_container">
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
</div>
<script src="/front/JS/Liste_Cours.js" type="text/javascript"></script>
<script type="text/javascript">
    let cours = <?php echo json_encode($liste); ?>;
    let listCat = [];
    <?php
        for($i=0; $i<count($categories); $i++){
            echo 'listCat['.$i.'] = '. json_encode($categories[$i]).';';
        }
        ?>
    updateCours(cours, "Web/");
</script>
</body>
<?php include('../../Header_Footer/footer.php') ?>
</html>
