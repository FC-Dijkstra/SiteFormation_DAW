<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/ListeCours.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/class/utilisateur.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
?>

<?php
if (isset($_SESSION["userID"]))
{
    $user = utilisateur::load($_SESSION["userID"]);
    $userIcon = "/back/data/userIcons/" . $user->get("userIcon");
    $nom = $user->get("nom");
    $prenom = $user->get("prenom");
    $email = $user->get("email");
}
else
{
    redirect::to("index.php");
}
?>

<link rel="stylesheet" href="/front/CSS/Utilisateur/profil.css" type="text/css"/>
<body>
    <h1 id="profiltitre"> Mon profil </h1>
    <div id="profil">

        <div id="pbox1">
            <img id="photoprofil" src="<?= $userIcon?>" alt="profil" />

        </div>
        <div id="pbox2">
        <form id="modifprofil" action="/back/router.php" method="post">
            <label id="nom" type="text">Nom :</label>
            <input type="text" id="info_nom" name="nom" value="<?= $nom?>" readonly><br>

            <label id="prenom" type="text">Prénom :</label>
            <input type="text" id="info_prenom" name="prenom" value="<?= $prenom?>" readonly><br>

            <label id="mail" type="text">Adresse mail liée:</label>
            <input type="email" id="info_mail" name="email" value="<?= $email?>" readonly><br>
            <label class="file">Changer de photo : </label>
            <input type="file" name="image" class="file">
            <br><br>
            <a id="mdp">Mot de passe </a><br>
            <label class="mdp" type="text">Mot de passe</label>
            <input class="mdp" type="password" name="password"><br>
            <label class="mdp" type="text">Nouveau mot de passe</label>
            <input class="mdp" type="password" name="newpassword" id="info_nouveaumdp" value=""><br>

            <label class="mdp" type="text">Confirmation nouveau mot de passe</label>
            <input class="mdp" type="password" id="info_nouveaumdp" value=""><br>

            <input type="hidden" name="action" value="editprofile"/>
            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"]?>"/>
            <input type="submit" id="enregistrer" value="Enregistrer">
            <input type="reset" id="annuler" value="Annuler" onclick="ModifierInfos()">
            <button id="modifier" type="button" onclick="ModifierInfos()" >Modifier </button>

        <form>
        </div>
    </div>



    <div id="cours">
        <h1> Cours suivis : </h1>
        <hr>

        <?php
            $cours = coursSuivi($_SESSION["userID"]);
            foreach($cours as $c)
            {
                $id = $c->get("id");
                if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/back/data/cours/$id/favicon.png"))
                {
                    $icon = "/back/data/cours/{$id}/favicon.png";
                }
                else
                {
                    $icon = "/front/IMG/girl.png";
                }

                $nomCours = $c->get("nom");

                switch ($c->get("difficulte"))
                {
                    case "Débutant":
                        $difficulte = "Débutant ★✩✩✩";
                        break;
                    case "Intermédiaire":
                        $difficulte = "Intermédiaire ★★✩✩";
                        break;
                    case "Avancé":
                        $difficulte = "Avancé ★★★✩";
                        break;
                    case "Expert":
                        $difficulte = "Expert ★★★★";
                        break;
                    default:
                        $difficulte = "n/a";
                        break;
                }
                include ("template/CoursSuivi.php");
            }
        ?>

    </div>


    <div id="recommandations">
    <p>Tu ne sais pas quels cours suivre ? <a href="index.php?page=accueilQCM">Teste ton niveau !</a></p>
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
<script type="text/javascript" src="/front/JS/Utilisateur/profil.js"></script>