</br>
<div class="cours">
    <img class="box1" src="<?= $icon?>" onclick="location.href='/front/PHP/Cours/structureCours.php'">
    <h3 class="box2" onclick="location.href='/front/PHP/Cours/structureCours.php'"><?= $nomCours?> </h3>
    <p class="box3"><?= $difficulte ?> </p>
    <!--<p class="box4"> Ceci est une description</p>-->
    <form action="/back/router.php" method="post">
        <input type="hidden" name="action" value="unfollow"/>
        <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"]?>"/>
        <input type="hidden" name="cours" value="<?= $id ?>"/>
        <input type="submit" class="box5" type="button" value="Se désabonner">
    </form>

</div>