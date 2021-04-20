<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Admin/profilAdmin.css" type="text/css"/>
<?php include_once(__DIR__ . "./../../Header_Footer/header.php");
?>

    <body>
        <h1 id="profiltitre"> Mon profil </h1>
        <div id="profil">

            <div id="pbox1">
                <img id="photoprofil" src="../../IMG/defaut_profil.png" alt="profil"/>
                <label>Changer de photo : </label>

                <input type="file" name="image" id="file">
            </div>
            <div id="pbox2">
            <form id="modifprofil">
                <label id="nom" type="text">Nom :</label>
                <input type="text" id="info_nom" value="Martin" readonly><br>

                <label id="prenom" type="text">Prénom :</label>
                <input type="text" id="info_prenom" value="Jonathan" readonly><br>

                <label id="mail" type="text">Adresse mail liée:</label>
                <input type="email" id="info_mail" value="jonathan.martinmaestre71@gmail.com" readonly><br><br>

                <a id="mdp">Mot de passe </a><br>

                <label class="mdp" type="text">Nouveau mot de passe</label>
                <input class="mdp" type=text id="info_nouveaumdp" value=""><br>

                <label class="mdp" type="text">Confirmation nouveau mot de passe</label>
                <input class="mdp" type=text id="info_nouveaumdp" value=""><br>

                <input type="submit" id="enregistrer" value="Enregistrer">
                <button id="modifier" type="button" onclick="ModifierInfos()" >Modifier </button>

                <form>
              </div>
              </div>

        <div id="cours">
            <h1> Gestion des cours : </h1>
            <hr>
            <br/>
            <div class="ajoutCours">
              <button id="add" type="button" onclick="location.href='ajoutCours.php'">Ajouter un cours</button>
              <h1> Cours postés : </h1>
              <hr>
              <br/>
            </div>
            <div class="cours">
                <img class="box1" src="../../../IMG/girl.png">
                <h3 class="box2"> Les bases du html</h3>
                <p class="box3">Facile ★✩✩ </p>
                <p class="box4"> Ceci est une description</p>
            </div>
        </div>


        <div id="moderation">
          <h1> Modération : </h1>
          <hr>
          </br>
          <div class="mod">
              <button id="add" type="button" onclick="location.href='gererUser.php'"> Modérer les utilisateurs</button>
          </div>
        </div>
    </body>
    <?php include_once(__DIR__ ."../../Header_Footer/footer.php"); ?>
</html>
