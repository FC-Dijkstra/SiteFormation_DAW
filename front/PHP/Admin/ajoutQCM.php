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
            <option value="1">HTML</option>
            <option value="2">CSS</option>
            <option value="3">JavaScript</option>
            <option value="4">Java</option>
            <option value="5">Swift</option>
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
        <input type="submit" id="envoie" value="Ajouter"/>
    </form>
</body>
