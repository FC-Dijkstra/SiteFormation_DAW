<div class="create_cat">
    <button class="bouton create_cat_bt">Créer une catégorie</button>
    <div class="cat_detail">
        <form class="createConversation" action="/back/router.php?action=createCategorie&csrf_token=<?= Token::get()?>" method="post">
            <label>
                Categorie : <input type="text" name="categorie" placeholder="Cat"/>
            </label> /
            <label>
                <input name="subcategorie" placeholder="Sub" />
            </label><br />
            <button type="submit" class="bouton">Valider</button>
        </form>
    </div>
</div>