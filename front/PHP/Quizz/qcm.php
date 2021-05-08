<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/Input.php");

if (Input::exists())
{
    $content = unserialize(Input::get("qcm"));
    $cours = $content->meta->cours;
    $difficulte = $content->meta->difficulte;
    $qcmID = $content->meta->id;
}
?>

<link rel="stylesheet" href="/front/CSS/Quizz/qcm.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/qcm.js"></script>
<body class="light">
    <div id="centre">
        <div id="progress"></div>
            <h3 id="bvn"> <?= $cours ?> | <?= $difficulte ?> </h3>
            <hr/>
            <form id="qcm" action="/back/router.php" method="post">
                <input type="hidden" name="qcmID" id="qcmID" value="<?= $qcmID?>"/>

                <?php
                foreach($content->question as $question)
                    {
                        $questionID = $question->id;
                        $enonce = $question->enonce;
                        $reponses = $question->reponse;
                        include ("template/question.php");
                    }
                ?>

                <input type="hidden" name="action" value="validerQCM"/>
                <input type="hidden" name="csrf_token" value="<?= Token::get()?>"/>
            </form>
            <button id="bouton">Valider</button>
        <br/>
        <br/>
        </div>
    </div>
</body>
