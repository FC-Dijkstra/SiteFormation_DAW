<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/ListeCours.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/class/utilisateur.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
session_start();
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
    redirect::to("/front/PHP/accueil.php");
}
?>

<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Utilisateur/profil.css" type="text/css"/>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/front/Header_Footer/header.php");?>
    <body>
        <h1 id="profiltitre"> Mon profil </h1>
        <div id="profil">
            
            <div id="pbox1">
                <img id="photoprofil" src="<?= $userIcon?>" alt="profil" />

            </div>
            <div id="pbox2">
            <form id="modifprofil">
                <label id="nom" type="text">Nom :</label>
                <input type="text" id="info_nom" value="<?= $nom?>" readonly><br>

                <label id="prenom" type="text">Prénom :</label>
                <input type="text" id="info_prenom" value="<?= $prenom?>" readonly><br>

                <label id="mail" type="text">Adresse mail liée:</label>
                <input type="email" id="info_mail" value="<?= $email?>" readonly><br>
                <label class="file">Changer de photo : </label>
                <input type="file" name="image" class="file">
                <br><br>
                <a id="mdp">Mot de passe </a><br>
                <label class="mdp" type="text">Mot de passe</label>
                <input class="mdp" type="password"><br>
                <label class="mdp" type="text">Nouveau mot de passe</label>
                <input class="mdp" type="password" id="info_nouveaumdp" value=""><br>

                <label class="mdp" type="text">Confirmation nouveau mot de passe</label>
                <input class="mdp" type="password" id="info_nouveaumdp" value=""><br>

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
                        case "Debutant":
                            $difficulte = "Débutant ★✩✩✩";
                            break;
                        case "Intermediaire":
                            $difficulte = "Intermédiaire ★★✩✩";
                            break;
                        case "Avance":
                            $difficulte = "Avancé ★★★✩";
                            break;
                        case "Expert":
                            $difficulte = "Expert ★★★★";
                            break;
                        default:
                            $difficulte = "Difficulte";
                            break;
                    }
                    include ("template/CoursSuivi.php");
                }
            ?>

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