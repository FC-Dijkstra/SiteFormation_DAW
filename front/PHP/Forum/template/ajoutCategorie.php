<div class="create_cat">
    <button class="bouton create_cat_bt" type="button">Créer une catégorie</button>
    <div class="cat_detail">
        <form class="createConversation" action="/back/router.php?action=createCategorie&csrf_token=<?= Token::get()?>" method="post">
            <label>
                Categorie : <input type="text" name="categorie" placeholder="Cat"/>
            </label> /
            <label>
                <input name="subcategorie" placeholder="Sub" />
            </label><br />
            <input type="submit" class="bouton" value="Valider"/>
        </form>
    </div>
</div>