<link rel="stylesheet" href="/front/CSS/web.css" type="text/css"/>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/categorie.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/AffichageCours.php");

$liste = getByCategorie("App");
$categories = categorie::getAllByType("App");

?>
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
    updateCours(cats, "App/");
</script>
</body>
