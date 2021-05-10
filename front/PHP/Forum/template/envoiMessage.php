<button id="openModal" class="bouton">Répondre</button>
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close">&times;</span>
        <div class="modal-body">
            <form action="/back/router.php" method="post">
                <input type="hidden" name="csrf_token" value="<?= Token::get()?>"/>
                <input type="hidden" name="action" value="sendMessage"/>
                <input type="text" id="contenu" name="contenu"/>
                <input type="hidden" name="conversation" value="<?=$ID?>"/>
                <input type="submit" id="send" value="Envoyer"/>
            </form>
        </div>
    </div>
</div>