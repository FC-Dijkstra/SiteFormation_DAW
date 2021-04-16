<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Utilisateur/profil.css" type="text/css"/>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/header.php"); ?>
    
    <body>
        <div id="profil">
        <h2> Mon profil </h2>
            <div id="pbox1">
                <img id="photoprofil" src="/front/IMG/defaut_profil.png" alt="profil" />
            </div>
            <div id="pbox2">
                <label id="nom" type="text">Nom :</label>
                <input type="text" id="info_nom" value="Martin" readonly><br>

                <label class="prenom" type="text">Prénom :</label>
                <input type="text" id="info_prenom" value="Jonathan" readonly><br>

                <label class="mail" type="text">Adresse mail liée:</label>
                <input type="email" id="info_mail" value="jonathan.martinmaestre71@gmail.com" readonly><br>

                <a class="mdp">Changer mot de passe </a><br>

                <button id="modifier" type="button" onclick="ModifierInfos()" >Modifier </button>
            </div>
        </div>

        <hr>

        <div id="cours">
            <h1> Cours suivis : </h1>
            </br>
            <div class="cours">
                <img class="box1" src="/front/IMG/girl.png">
                <h3 class="box2"> Les bases du html</h3>
                <p class="box3">Facile ★✩✩ </p>
                <p class="box4"> Ceci est une description</p>
            </div>
        </div>

        <hr>
        <div id="recommandations">
            <h1> Mes recommandations : </h1>
            </br>
            <div class="reco">
                <img src="/front/IMG/girl.png">
                <h3> Les bases du html</h3>
                <p>Difficulté du cours : facile ★✩✩ </p>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="../../JS/Utilisateur/profil.js"></script>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."//front/Header_Footer/footer.php"); ?>
</html>