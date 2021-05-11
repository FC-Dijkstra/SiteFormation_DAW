<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/controllers/ListeCours.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/class/utilisateur.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/back/helpers/redirect.php");

if(isset($_SESSION["userID"]) && !empty($_SESSION["admin"]))
{
    $user = utilisateur::load($_SESSION["userID"]);
    $userIcon = "/back/data/userIcons/" . $user->get("userIcon");
    $nom = $user->get("nom");
    $prenom = $user->get("prenom");
    $email = $user->get("email");
}
else
{
    redirect::to("accueil", "Accès interdit");
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

<link rel="stylesheet" href="/front/CSS/Admin/profilAdmin.css" type="text/css"/>
<body>
    <h1 id="profiltitre"> Mon profil </h1>
    <div id="profil">

        <div id="pbox1">
            <img id="photoprofil" src="<?= $userIcon ?>" alt="profil"/>
        </div>
        <div id="pbox2">
        <form id="modifprofil" action="/back/router.php" method="post">
            <label id="nom" type="text">Nom :</label>
            <input type="text" name="nom" id="info_nom" value="<?= $nom?>" readonly><br>

            <label id="prenom" type="text">Prénom :</label>
            <input type="text" name="prenom" id="info_prenom" value="<?= $prenom?>" readonly><br>

            <label id="mail" type="text">Adresse mail liée:</label>
            <input type="email" name="email" id="info_mail" value="<?= $email?>" readonly><br><br>

            <a id="mdp">Mot de passe </a><br>
            <label for="password" class="mdp" type="text">Mot de passe</label>
            <input class="mdp" name="password" type="password" name="password" required><br/>
            <label class="mdp" type="text">Nouveau mot de passe</label>
            <input class="mdp" name="newpassword" type="password" id="npassword" value=""><br>

            <label class="mdp" type="text">Confirmation nouveau mot de passe</label>
            <input class="mdp" type="password" id="conf_npassword" value=""><br>

            <input type="hidden" name="action" value="editprofile" required/>
            <input type="hidden" name="csrf_token" value="<?= Token::get()?>" required/>

            <input type="submit" class="bouton" id="enregistrer" value="Enregistrer">
            <input type="reset" class="bouton" id="annuler" value="Annuler" onclick="ModifierInfos()">
            <button id="modifier" class="bouton" type="button" onclick="ModifierInfos()" >Modifier </button>

            <form>
          </div>
          </div>

    <div id="cours">
        <h1> Gestion des cours / QCM : </h1>
        <hr>
        <br/>
        <div class="ajoutCours">
          <button id="add" class="bouton" type="button" onclick="location.href='index.php?page=ajoutCours'">Ajouter un cours</button>
            <button id="addQCM" class="bouton" type="button" onclick="location.href='index.php?page=ajoutQCM'">Ajouter un QCM</button>
          <h1> Cours postés : </h1>
          <hr>
          <br/>
        </div>
        <?php
            $cours = coursCree();
            foreach($cours as $c)
            {
                $id = $c["id"];
                if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/back/data/cours/{$c["id"]}/favicon.png"))
                {
                    $icon = "/back/data/cours/{$c["id"]}/favicon.png";
                }
                else
                {
                    $icon = "/front/IMG/girl.png";
                }
                $titre = $c["nom"];
                $difficulte = printDifficulte($c["difficulte"]);

                include ("template/CoursPoste.php");
            }
        ?>
    </div>


    <div id="moderation">
      <h1> Modération : </h1>
      <hr>
      </br>
      <div class="mod">
          <button id="add" class="bouton" type="button" onclick="location.href='index.php?page=gererUser'"> Modérer les utilisateurs</button>
      </div>
    </div>
	
	<form id="removeUser" action="/back/router.php" method="post">
		<input type="hidden" name="action" value="removeAccount" required/>
        <input type="hidden" name="csrf_token" value="<?= Token::get()?>" required/>
		<button id="removeAccount" class="bouton" type="button" onclick="removeUser()"> Supprimer mon compte </button>
	</form>
	
</body>
<script type="text/javascript" src="/front/JS/Utilisateur/profil.js" defer></script>