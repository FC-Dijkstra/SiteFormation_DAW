<?php
require_once(__DIR__ . "./../controllers/compte.php");
require_once(__DIR__ . "./../helpers/token.php");
session_start();
$csrf = token::generate();
echo $csrf;

if (isset($_SESSION["userID"]))
{
    echo "<form method='post' action='../router.config php'> <input type='submit' value='deco'/>
        <input type='hidden' value='deconnexion' name='action'/> <input type='hidden' value='" . $_SESSION["csrf_token"] . "'name='csrf_token'/>
</form>";
    echo $_SESSION["userID"];
}
?>

<html>
<!--
    <form action="../router.php" method="post" enctype="multipart/form-data">
        <fieldset class="form">
            <h2> Inscription </h2>

            <p> Pas encore inscrit ? <br/> Rejoins-nous ! </p>

            <label class="prenom" type="button"> Prénom</label>
            <input type="hidden" value="inscription" name="action"/>
            <input type="text" id="prenom" name="prenom" value="YANN" required>
            <div><br/></div>

            <label class="nom" type="button"> Nom</label>

            <input type="text" id="nom" name="nom" value="TROU" required>
            <div><br/></div>

            <label class="email" type="button"> Adresse mail</label>

            <input type="email" id="email" size="30" value="adad@gmail.com" name="email" required>
            <div><br/><br/></div>

            <label class="mdp" type="button"> Mot de passe</label>

            <input type="password" id="pass" value="aaa" name="password" required>

            <div><br/></div>

            <label class="mdp" type="button">Confirmation</label>

            <input type="password" id="confpass" value="aaa" name="confpassword" required>

            <div><br/></div>

            <label>Choisir une photo de profil : </label>
            <input type="file" name="photo" id="file">

            <div><br/></div>
            <input type="hidden" value="<?php echo $_SESSION["csrf_token"]; ?>" name="csrf_token"/>
            <input class="confirmeInscription" type="submit" value="Inscription">

            <h2> Connexion </h2>

            <p> Tu as déjà un compte ? <br/> Connecte-toi ! </p>

            <button class="connexion" type="button" onclick="location.href='/front/PHP/utilisateur/connexion.php'"> Je me connecte ! </button>
        </fieldset>
    </form> -->
<form class="connexion" action="../router.php" method="post">
    <fieldset class="form">
        <h2> Connexion </h2>
        <p> Pressé d'apprendre ? <br/> Connecte-toi ! </p>

        <label id="mail" type="button"> Adresse mail</label>

        <input type="email" id="email" name="email" value="bbb@gmail.com" size="30" required>

        <div><br/></div>

        <label id="mdp" type="button"> Mot de passe</label>

        <input type="password" id="pass" value="bbb" name="password" required>

        <div><br/></div>
        <input type="hidden" value="<?php echo $_SESSION["csrf_token"]; ?>" name="csrf_token"/>
        <input type="hidden" name="action" value="connexion"/>
        <input type="submit" id="connexion" value="Connexion">

        <h2> Inscription </h2>
        <p> Pas encore inscrit ? <br/> Rejoins-nous ! </p>
        <button class="inscription" type="button"  onclick="location.href='/front/PHP/utilisateur/inscription.php'"> Je m'inscris ! </button>
    </fieldset>
</form>
</html>
