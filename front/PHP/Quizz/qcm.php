<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/Input.php");

if (Input::exists())
{
    $content = unserialize(Input::get("qcm"));
    var_dump($content->question);
    $cours = $content->meta->cours;
    $difficulte = $content->meta->difficulte;
}
?>

<link rel="stylesheet" href="/front/CSS/Quizz/qcm.css" type="text/css"/>
<script type="text/javascript" src="/front/JS/qcm.js"></script>
<body class="light">
    <div id="centre">
        <div id="progress"></div>
            <h3 id="bvn"> <?= $cours ?> | <?= $difficulte ?> </h3>
            <div id="qcm">
            <?php
            foreach($content->question as $question)
                {
                    $questionID = $question->id;
                    $enonce = $question->enonce;
                    $reponses = $question->reponse;
                    include ("template/question.php");
                }
            ?>
            <input id="bouton" type="button" value="Valider"/>
            </div>
        <br/>
        <br/>
        </div>
    </div>
</body>
