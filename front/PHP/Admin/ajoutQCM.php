<body>
    <form id="f" action="/back/router.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="saveQCM"/>
        <input type="hidden" name="csrf_token" value="<?= Token::get();?>"/>

        <label for="noteMax">Note maximale</label>
        <input type="text" name="maxResultat"/>
        <br/>
        <label for="cours">Cours</label>
        <select name="cours" form="f">
            <option value="1">Nom du cours 1</option>
        </select>
        <br/>
        <label for="question">Fichier de questions</label>
        <input type="file" name="question"/>
        <br/>
        <label for="reponse">Fichier de réponses</label>
        <input type="file" name="reponse"/>
        <input type="submit" value="Envoyer"/>
    </form>
</body>