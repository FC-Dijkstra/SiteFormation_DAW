<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
if (empty($_SESSION["admin"]))
    redirect::to("accueil", "Accès interdit");
?>

<div class="cours">
    <img class="box1" src="<?= $icon?>"/>
    <h3 class="box2"><?= $titre?></h3>
    <p class="box3"><?= $difficulte?></p>
    <button class="bouton supprimerCours"  onclick="location.href='/back/router.php?action=deleteCours&cours=<?= $id?>&csrf_token=<?= Token::get()?>'" type="button" value="désabo">Supprimer</button>
</div>