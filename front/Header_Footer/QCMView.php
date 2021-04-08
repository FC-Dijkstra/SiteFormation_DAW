<?php $title = "Affichage QCM"; ?>

<?php ob_start(); ?>
<div id="output"></div>
<div id="validate">Valider</div>
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="../JS/QCM.js" defer></script>
<?php $scripts = ob_get_clean(); ?>

<?php require_once("template.php"); ?>