<form action="/back/router.php" method="post">
    <input type="hidden" name="action" value="lockConversation"/>
    <input type="hidden" name="csrf_token" value="<?= Token::get()?>"/>
    <input type="hidden" name="conversation" value="<?= $conv?>"/>
    <input type="submit" class="bouton lock" value="Verrouiller"/>
</form>