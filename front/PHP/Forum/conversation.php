<!DOCTYPE html>
<html lang="fr">

<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
include(__DIR__ . "./../../Include/header_base.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/conversation.php");
$test = new conversation(1, 1, "Titre de la conversation");
?>
<body>
<h2 class="conversation_category">Forum HTML</h2>
<div class="conversation_op">
    <h1><?php echo $test->get('titre') ?></h1>
    <div class="message">
        <div class="message_header">
            <span class="message_author_name">Gwendal L.</span>
            <span class="message_date">Hier </span>
        </div>
        <hr>
        <div class="message_content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a rhoncus magna, ut bibendum nibh. Nam
            tempor eros mi, id fermentum est rhoncus mollis. Praesent laoreet ante id nisi dictum rutrum in sit amet
            enim. Vivamus ex ipsum, dapibus non metus ac, tempor maximus urna. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Proin eget consequat ligula, eget
            posuere ex.
        </div>
    </div>
</div>
<hr class="separator_op">
<div class="messages">
    <div class="message">
        <div class="message_header">
            <span class="message_author_name">Jojo</span>
            <span class="message_date">Aujourd'hui</span>
        </div>
        <hr>
        <div class="message_content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a rhoncus magna, ut bibendum nibh. Nam
            tempor eros mi, id fermentum est rhoncus mollis. Praesent laoreet ante id nisi dictum rutrum in sit amet
            enim. Vivamus ex ipsum, dapibus non metus ac, tempor maximus urna. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Proin eget consequat ligula, eget
            posuere ex.
        </div>
    </div>

    <div class="message">
        <div class="message_header">
            <span class="message_author_name">Camille</span>
            <span class="message_date">Aujourd'hui</span>
        </div>
        <hr>
        <div class="message_content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a rhoncus magna, ut bibendum nibh. Nam
            tempor eros mi, id fermentum est rhoncus mollis. Praesent laoreet ante id nisi dictum rutrum in sit amet
            enim. Vivamus ex ipsum, dapibus non metus ac, tempor maximus urna. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Proin eget consequat ligula, eget
            posuere ex.
        </div>
    </div>
</div>
<div class="forum_foot">
    <button onclick='alert("Zone de texte à développer")'>Répondre</button>
    <div class="forum_foot_pages">
        Page <span id="page"></span>/X<br/>
        <a id="prev" href="">Prev</a> | <a id="next" href="">Next</a>
    </div>
</div>
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


<?php include(__DIR__ . './../../Include/footer.php') ?>
</html>