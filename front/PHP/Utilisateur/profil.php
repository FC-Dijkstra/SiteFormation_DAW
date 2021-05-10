<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/ListeCours.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/class/utilisateur.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/recommandation.php");

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
    redirect::to("accueil", "Erreur");
}

function printDifficulte($difficulte): string
{
    switch($difficulte)
    {
        case "Débutant":
            return "Débutant ★✩✩✩";

        case "Intermédiaire":
            return "Intermédiaire ★★✩✩";

        case "Avancé":
            return "Avancé ★★★✩";

        case "Expert":
            return "Expert ★★★★";

        default:
            return "n/a";
    }
}
?>

<link rel="stylesheet" href="/front/CSS/Utilisateur/profil.css" type="text/css"/>
<body>
    <h1 id="profiltitre"> Mon profil </h1>
    <div id="profil">

        <div id="pbox1">
            <img id="photoprofil" src="<?= $userIcon?>" alt="profil" />
            </form>

        </div>
        <div id="pbox2">
        <form id="modifprofil" action="/back/router.php" method="post">
            <label for="nom" id="nom" type="text">Nom :</label>
            <input type="text" id="info_nom" name="nom" value="<?= $nom?>" readonly><br>

            <label for="prenom" id="prenom" type="text">Prénom :</label>
            <input type="text" id="info_prenom" name="prenom" value="<?= $prenom?>" readonly><br>

            <label for="email" id="mail" type="text">Adresse mail liée:</label>
            <input type="email" id="info_mail" name="email" value="<?= $email?>" readonly><br>
            <br>
            <a id="mdp">Mot de passe </a><br>
            <label for="password" class="mdp" type="text">Mot de passe actuel</label>
            <input class="mdp" type="password" name="password" required><br>
            <label for="newpassword" class="mdp" type="text">Nouveau mot de passe</label>
            <input class="mdp" type="password" name="newpassword" id="npassword" value=""><br>

            <label for="conf_newpassword" class="mdp" type="text">Confirmation nouveau mot de passe</label>
            <input class="mdp" type="password" id="conf_npassword" name="conf_newpassword" value=""><br>

            <input type="hidden" name="action" value="editprofile"/>
            <input type="hidden" name="csrf_token" value="<?= Token::get()?>"/>

            <input type="submit" id="enregistrer" value="Enregistrer">
            <input type="reset" id="annuler" value="Annuler" onclick="ModifierInfos()">
            <button id="modifier" type="button" onclick="ModifierInfos()" >Modifier </button>


        </form>
        </div>
    </div>



    <div id="cours">
        <hr>
        <h1> Cours suivis : </h1>


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

                $difficulte = printDifficulte($c->get("difficulte"));
                include ("template/CoursSuivi.php");
            }
        ?>

    </div>


    <div id="recommandations">
    <p>Tu ne sais pas quel cours suivre ? <a id="quizz" href="index.php?page=accueilQCM">Teste ton niveau !</a></p>
        <hr>
        <h1> Mes recommandations : </h1>
        </br>
        <div class="reco_container">
        <?php
            $cours = getRecommendations();

            foreach($cours as $c)
            {
                $id = $c->get("id");
                if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/back/data/cours/$id/favicon.png"))
                    $icon = "/back/data/cours/$id/favicon.png";
                else
                    $icon = "/front/IMG/Girl.png";

                $titre = $c->get("nom");
                $difficulte = printDifficulte($c->get("difficulte"));
                include ("template/CoursRecommande.php");
            }
        ?>
        </div>
    </div>
	<form id="removeUser" action="/back/router.php" method="post">
		<input type="hidden" name="action" value="removeAccount" required />
        <input type="hidden" name="csrf_token" value="<?= Token::get()?>" required />
		
	</form>
	<button id="removeAccount" type="button" onclick="removeUser()"> Supprimer mon compte </button>
</body>
<script type="text/javascript" src="/front/JS/Utilisateur/profil.js"></script>
