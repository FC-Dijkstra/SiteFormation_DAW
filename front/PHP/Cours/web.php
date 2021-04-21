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

</div>
<script src="/front/JS/Liste_Cours.js" type="text/javascript"></script>
<script type="text/javascript">
    let cats = <?php echo json_encode($liste); ?>;
    let listCat = [];
    <?php
        for($i=0; $i<count($categories); $i++){
            echo 'listCat['.$i.'] = '. json_encode($categories[$i]).';';
        }
        ?>
    updateCours(cats, "Web/");
</script>
</body>
<?php include('../../Header_Footer/footer.php') ?>
</html>
