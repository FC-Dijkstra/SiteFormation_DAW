<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/Forum.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
if (empty($_SESSION["admin"]))
    redirect::to("accueil", "Accès interdit");

$utilisateurs = getAllUtilisateurs();
?>

<link rel="stylesheet" href="/front/CSS/Admin/gererUser.css" type="text/css"/>
<body>
  <div id="corps">
    <h2> Gérer les utilisateurs </h2>
    <hr/>
    </br>
    <div id="tabbut">
        <button class="bouton" id="supp" type="button" value="Supprimer">Supprimer</button>
        <div name="formulaire">
            <input type="hidden" id="csrf" value="<?= Token::get();?>"/>
            <table class="listeUser">
                <tbody>
                  <caption> Liste des étudiants </caption>
                  <?php
                  foreach($utilisateurs as $utilisateur)
                  {
                      $prenom = $utilisateur->get("prenom");
                      $nom = $utilisateur->get("nom");
                      $email = $utilisateur->get("email");
                      $id = $utilisateur->get("id");
                      include ("template/User.php");
                  }
                  ?>
                </tbody>
              </table>
        </div>
    </div>
  </div>
<script type="text/javascript" src="/front/JS/Admin/gererUser.js"></script>
</body>
