</br>
<div class="cours" onclick="location.href='/front/PHP/Cours/structureCours.php'">
    <img class="box1" src="<?= $icon?>">
    <h3 class="box2"><?= $nomCours?> </h3>
    <p class="box3"><?= $difficulte ?> </p>
    <!--<p class="box4"> Ceci est une description</p>-->
    <button class="box5"  onclick="location.href='/back/router.php?action=unfollow&id=<?= $id?>'" type="button" value="désabo">Se désabonner</button>
</div>