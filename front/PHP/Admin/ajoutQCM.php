<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/QCM.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
if (empty($_SESSION["admin"]))
    redirect::to("accueil", "Accès interdit");

?>

<body>
  <link rel="stylesheet" href="/front/CSS/Admin/ajoutQCM.css" type="text/css"/>
    <form id="f" action="/back/router.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="saveQCM"/>
        <input type="hidden" name="csrf_token" value="<?= Token::get();?>"/>
        <h2> Ajouter un QCM </h2>
        <hr/>
        <div class="corps">
        <fieldset>
          <legend for="noteMax">Note maximale</legend>
        <input type="text" name="maxResultat"/>
        </fieldset>
        <hr class="info"/>
        <br/>
        <fieldset>
          <legend for="cours">Cours</legend>
        <select name="cours" form="f">
            <?php
            $cours = getAllCours();
            foreach($cours as $c)
            {
                echo "<option value='{$c["id"]}'>{$c["nom"]}</option>";
            }
            ?>
        </select>
        </fieldset>
        <hr class="info"/>
        <br/>
        <fieldset>
          <legend for="question">Fichier de questions : </legend>
        <input class="file" type="file" name="question"/>
        </fieldset>
        <hr class="info"/>
        <br/>
        <fieldset>
          <legend for="reponse">Fichier de réponses : </legend>
        <input class="file" type="file" name="reponse"/>
        </fieldset>
        <hr class="info"/>
        <br/>
        </div>
        <input class="bouton" type="submit" id="envoie" value="Ajouter"/>
    </form>
</body>
