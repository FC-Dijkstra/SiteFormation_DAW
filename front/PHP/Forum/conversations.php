<link rel="stylesheet" href="/front/CSS/Forum/index.css" type="text/css">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/class/categorie.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/back/controllers/Forum.php");


if (Input::exists())
{
    $id = filter_var(Input::get("id"), FILTER_SANITIZE_NUMBER_INT);
    if (isset($id))
    {
        $conversations = recupConvById($id);
        $cateName = categorie::getById($id);
    }
    else
    {
        redirect::to("accueil", "Erreur, conversation introuvables");
    }
}
else
{
    redirect::to("accueil", "Erreur");
}
?>


<body>
<div class="container">
    <div class="forum_header">
        <h3>Forum <?php echo $cateName["titre"]; ?></h3>
    </div>
    <?php
    if (isset($_SESSION["userID"]))
    {
        include ("template/ajoutConversation.php");
    }
    ?>
    <div class="forum_category">
        <table class="forum_category_table">
            <tbody>
            <?php

            for ($i = 0; $i < count($conversations); $i++) {
                $idconv = $conversations[$i]["id"];
                echo "<tr><td onclick=location.href=\"index.php?page=messagesForum&id=$idconv\"> " . $conversations[$i]["titre"] . "</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="/front/JS/Forum.js"></script>
</body>