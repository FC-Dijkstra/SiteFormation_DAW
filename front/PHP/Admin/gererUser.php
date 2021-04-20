+<!DOCTYPE html>
<html lang="fr" >
<?php
include($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/header.php");
?>
<link rel="stylesheet" href="../../CSS/Admin/gererUser.css" type="text/css"/>
<body>
  <div id="corps">
    <h2> Gérer les utilisateurs </h2>
    <hr/>
    </br>
    <input id="ban" type="button" onclick="ban()" value="Bannir">
    <input id="supp" type="button" value="Supprimer">

    <form name="formulaire">
    <table class="listeUser">
        <tbody>
          <caption> Liste des étudiants </caption>
        <tr>
          <td id="moi" class="check"> <input type="checkbox"></td>
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
<script type="text/javascript" src="../JS/Admin/gererUser.js"></script>
    </body>

  <?php include_once($_SERVER['DOCUMENT_ROOT']."//front/Header_Footer/footer.php"); ?>
    </html>
