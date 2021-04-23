<br/>
<br/>
<fieldset>
    <legend><?= $questionID?> | <?= $enonce?></legend>
    <?php
    for ($i = 0; $i < count($reponses); $i++)
        {
            echo "<input type='radio' name='$questionID' value='{$reponses[$i]->id}'/>";
            echo "<span class='reponse'>{$reponses[$i]->value}</span>";
            echo "<br/>";
        }
    ?>
</fieldset>