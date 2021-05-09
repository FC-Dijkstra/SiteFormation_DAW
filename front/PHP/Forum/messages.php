<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/conversation.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/class/message.php");
$ID = $_GET['id'];
$conversation = recup1Conv($ID);
$messages = recupMessages($ID);
?>
<body>
<div class="container">
<h2 class="conversation_category">Forum HTML</h2>
<div class="conversation_op">
    <h1><?php echo $conversation->get('titre'); ?></h1>
    <?php
        $auteur = recupAuthor($messages[0]->get("auteur"));
        $authorName = $auteur->get("prenom") ." ".substr($auteur->get("nom"),0,1).".";
        $date = $messages[0]->get("date");
        $contenu = $messages[0]->get("contenu");

        include ("template/message.php");
    ?>
</div>
<hr class="separator_op">
<div class="messages">
<?php
	for($i = 1;$i < count($messages);$i++)
	{
        $auteur = recupAuthor($messages[$i]->get("auteur"));
        $authorName = $auteur->get("prenom") ." ".substr($auteur->get("nom"),0,1).".";
        $date = $messages[$i]->get("date");
        $contenu = $messages[$i]->get("contenu");

        include ("template/message.php");
	}
?>
</div>
<div class="forum_foot">

    <?php
    if ($conversation->get("locked") == 0)
    {
        echo '<button id="openModal">Répondre</button>';
    }
    ?>

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
</div>
</div>
<script type="text/javascript" src="/front/JS/Forum.js"></script>
</body>