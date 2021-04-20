<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Utilisateur/connexion.css" type="text/css"/>
    <div id="page">
        <img id="logo" src="../../IMG/logo.png" alt="Logo" />
        <form class="connexion">
            <fieldset class="form">
                <h2> Connexion </h2>
                <p> Pressé d'apprendre ? <br/> Connecte-toi ! </p>

                <label id="mail" type="button"> Adresse mail</label>

                <input type="email" id="email" size="30" required>

                <div><br/></div>

                <label id="mdp" type="button"> Mot de passe</label>

                <input type="password" id="pass" name="password" required>

                <div><br/></div>

                <input type="submit" id="connexion" value="Connexion">

                <h2> Inscription </h2>
                <p> Pas encore inscrit ? <br/> Rejoins-nous ! </p>
                <button class="inscription" type="button"  onclick="location.href='inscription.php'"> Je m'inscris ! </button>
            </fieldset>
        </form>
        <a href="../accueil.php">Accueil</a>
    </div>
    </body> 
</html>


