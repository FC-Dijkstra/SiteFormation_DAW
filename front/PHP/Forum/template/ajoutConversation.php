<div class="create_cat">
    <button class="bouton create_cat_bt">Créer une conversation</button>
    <div class="cat_detail">
        <form class="createConversation" action="/back/router.php?action=createConversation&csrf_token=<?= Token::get()?>" method="post">
            <input type="hidden" name="categorie" value="<?= $_GET['id'] ?>"/>
            <label>
                Titre : <input type="text" name="titre" placeholder="Titre de la conversation"/>
            </label> <br />
            <label>
                Contenu : <textarea name="contenu" placeholder="Contenu du message initial"></textarea>
            </label><br />
            <button class="bouton" type="submit">Valider</button>
        </form>
    </div>
</div>
