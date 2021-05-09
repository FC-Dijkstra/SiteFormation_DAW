<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/conversation.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");
$ID = $_GET['id'];
$test = recup1Conv($ID);
$messages = recupMessages($ID);
?>
<body>
<div class="container">
<h2 class="conversation_category">Forum HTML</h2>
<div class="conversation_op">
    <h1><?php echo $test['titre']; ?></h1>
    <div class="message">
        <div class="message_header">
            <span class="message_author_name"><?php $auteur = recupAuthor($messages[0]["auteur"]);
													echo $auteur["prenom"]." ".substr($auteur["nom"],0,1).".";?></span>
            <span class="message_date"> <?php echo date("d/m/Y à H:i:s",strtotime($messages[0]["date"])); ?></span>
        </div>
        <hr>
        <div class="message_content">
            <?php 
				echo $messages[0]["contenu"];
			?>
        </div>
    </div>
</div>
<hr class="separator_op">
<div class="messages">
<?php 
	for($i = 1;$i < count($messages);$i++)
	{
		echo "<div class=\"message\">";
		echo "<div class=\"message_header\">";
		$auteur = recupAuthor($messages[$i]["auteur"]);
		echo "<span class=\"message_author_name\">".$auteur["prenom"]." ".substr($auteur["nom"],0,1)."."."</span>";
		echo "<span class=\"message_date\">".date("d/m/Y à H:i:s",strtotime($messages[0]["date"]))."</span>";
		echo "</div>"; 
		echo "<hr>";
		echo "<div class=\"message_content\">";
		echo $messages[$i]["contenu"];
		echo "</div>";
		echo "</div>";
	}
?>
</div>
<div class="forum_foot">
    <button id="openModal">Répondre</button>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close">&times;</span>
            <div class="modal-body">
                <form action="/back/router.php" method="post">
                    <input type="text" id="contenu"/>
                    <input type="button" id="send" value="Envoyer"/>
                </form>
            </div>
        </div>
    </div>
    <div class="forum_foot_pages">
        Page <span id="page"></span>/<?php echo (int)(count($messages)/20)+1;?><br/>
        <a id="prev" href="">Prev</a> | <a id="next" href="">Next</a>
    </div>
</div>
</div>
<script type="text/javascript" src="/front/JS/Forum.js"></script>
<script type="text/javascript">
    let params = new URLSearchParams(location.search);
    let page = params.get('page')===null?1:params.get('page');
    $("#page").text(page);
    params.set('page', ''+(Number(page)-1<1?1:Number(page)-1))
    $("#prev").attr('href', 'conversation.php?'+params.toString())
    params.set('page', ''+(Number(page)+1))
    $("#next").attr('href', 'conversation.php?'+params.toString())
</script>
</body>