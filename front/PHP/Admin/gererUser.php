<!DOCTYPE html>
<html lang="fr" >
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/front/Include/header_base.php");
?>
<link rel="stylesheet" href="../../CSS/Admin/gererUser.css" type="text/css"/>
<body>
  <div id="corps">
    <h2> Gérer les utilisateurs </h2>
    <hr/>
    </br>
    <div id="tabbut">
    <input id="ban" type="button" onclick="afficher()" value="Bannir">
    <input id="supp" type="button" value="Supprimer">
    <div id="dureeban" style="display:none;">
      <label> Durée (en jour)</label>
      <textarea id="duree" rows="1" cols="2"></textarea>
      <input id="valider" type="button" value="Valider ban">
    </div>
    <form name="formulaire">
    <table class="listeUser">
        <tbody>
          <caption> Liste des étudiants </caption>
        <tr>
          <td class="check"> <input type="checkbox"></td>
          <td>Prénom Nom Mail</td>
        </tr>
        <tr>
          <td class="check"> <input type="checkbox" id="selection"></td>
          <td> Prénom Nom Mail</td>
        </tr>
        <tr>
          <td class="check"> <input type="checkbox" id="selection"></td>
          <td> Prénom Nom Mail</td>
        </tr>
        <tr>
          <td class="check"> <input type="checkbox" id="selection"></td>
          <td> Prénom Nom Mail</td>
        </tr>
        </tbody>
      </table>
    </form>
    </div>
  </div>
<script type="text/javascript" src="../../JS/Admin/gererUser.js"></script>
    </body>

  <?php include_once($_SERVER['DOCUMENT_ROOT']."//front/Include/footer.php"); ?>
    </html>
