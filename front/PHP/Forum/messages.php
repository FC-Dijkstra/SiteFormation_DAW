<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/conversation.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/class/message.php");

if (Input::exists())
{
    $ID = Input::get("id");
    $ID = filter_var($ID, FILTER_SANITIZE_NUMBER_INT);
    if (isset($ID))
    {
        $conversation = recup1Conv($ID);
        $messages = recupMessages($ID);
    }
    else
    {
        redirect::to("conversations", "Erreur, conversation inexistante");
    }
}
?>
<body>
<div class="container">
    <h2 class="conversation_category"> Forum
        <?php
            echo getForumSection($conversation->get("categorie"))[0]["titre"];
        ?>
    </h2>
    <div class="conversation_header">
        <div class="conversation_title"><?php echo $conversation->get('titre'); ?></div>
        <?php
        if (!empty($_SESSION["admin"]))
        {
            $conv = $conversation->get("id");
            include("template/lock.php");
        }
        ?>
    </div>
    <div class="conversation_op">
        <?php
            if (!empty($messages))
            {
                $auteur = recupAuthor($messages[0]->get("auteur"));
                $authorName = $auteur->get("prenom") ." ".substr($auteur->get("nom"),0,1).".";
                $date = $messages[0]->get("date");
                $contenu = $messages[0]->get("contenu");
                $id = $messages[0]->get("id");
                $conv = $conversation->get("id");

                $showDelete = false;
                if (isset($_SESSION["userID"]) && $_SESSION["userID"] == $auteur->get("id")|| !empty($_SESSION["admin"]))
                {
                    $showDelete = true;
                }
                include ("template/message.php");
            }
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
                $id = $messages[$i]->get("id");
                $conv = $conversation->get("id");

                $showDelete = false;
                if ((isset($_SESSION["userID"]) && $_SESSION["userID"] == $auteur->get("id")) || !empty($_SESSION["admin"]))
                {
                    $showDelete = true;
                }
                include ("template/message.php");
            }
        ?>
    </div>
    <div class="forum_foot">

        <?php
        if ($conversation->get("locked") == 0 && isset($_SESSION["userID"]))
        {
            include("template/envoiMessage.php");
        }
        else
        {
            echo "<h3>Conversation verrouillée</h3>";
        }
        ?>

    </div>
</div>
<script type="text/javascript" src="/front/JS/Forum.js"></script>
</body>