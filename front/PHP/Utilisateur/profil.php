<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Utilisateur/profil.css" type="text/css"/>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/header.php");
?>

    <body>
        <h1 id="profiltitre"> Mon profil </h1>
        <div id="profil">
            
            <div id="pbox1">
                <img id="photoprofil" src="/front/IMG/defaut_profil.png" alt="profil" />
                <label class="file">Changer de photo : </label>

                <input type="file" name="image" class="file">
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
                <input type="reset" id="annuler" value="Annuler" onclick="ModifierInfos()">
                <button id="modifier" type="button" onclick="ModifierInfos()" >Modifier </button>
                
            <form>
            </div>
        </div>

        

        <div id="cours">
            <h1> Cours suivis : </h1>
            <hr>
            </br>
            <div class="cours" onclick="location.href='/front/PHP/Cours/structureCours.php'">
                <img class="box1" src="/front/IMG/girl.png">
                <h3 class="box2"> Les bases du html</h3>
                <p class="box3">Facile ★✩✩ </p>
                <p class="box4"> Ceci est une description</p>
                <button class="box5"  onclick="location.href='#'" type="button" value="désabo">Se désabonner</button>
            </div>
        </div>

        
        <div id="recommandations">
        <p>Tu ne sais pas quels cours suivre ? <a href="/front/PHP/Quizz/accueil_qcm.php">Teste ton niveau !</a></p>
            <h1> Mes recommandations : </h1>
            <hr>
            </br>
            <div class="reco">
                <img src="/front/IMG/girl.png">
                <h3> Les bases du html</h3>
                <p>facile ★✩✩</p>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../../JS/Utilisateur/profil.js"></script>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."//front/Header_Footer/footer.php"); ?>
</html>