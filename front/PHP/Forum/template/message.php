<div class="message">
    <div class="message_header">
        <span class="message_author_name"><?= $authorName?></span>
        <span class="message_date"><?=$date?></span>
    </div>
    <div class="message_content">
        <div><?=$contenu?></div>


    <?php
    if ($showDelete == true)
    {
        echo "<form action='/back/router.php' method='post'>";
        echo "<input type='hidden' name='action' value='deleteMessage'/>";
        echo "<input type='hidden' name='csrf_token' value='" . Token::get() . "'/>";
        echo "<input type='hidden' name='message' value='" . $id . "'/>";
        echo "<input type='hidden' name='conversation' value='" . $conv . "'/>";
        echo "<input type='submit' class='bouton deleteMessages' value='Supprimer message'/>";
        echo "</form>";
    }
    ?>

    </div>
</div>

