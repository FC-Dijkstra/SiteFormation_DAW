<!DOCTYPE html>
<html lang="fr" >
<link rel="stylesheet" href="../../CSS/Utilisateur/inscription.css" type="text/css"/>
    <div id="page">
        <img id="logo" src="../../IMG/logo.png" alt="Logo" />
        <form>
            <fieldset class="form">
                <h2> Inscription </h2>

                <p> Pas encore inscrit ? <br/> Rejoins-nous ! </p>

                <label class="prenom" type="button"> Prénom</label>

                <input type="text" id="prenom" name="prenom" required>
                <div><br/></div>

                <label class="nom" type="button"> Nom</label>

                <input type="text" id="nom" name="nom" required>
                <div><br/></div>

                <label class="email" type="button"> Adresse mail</label>

                <input type="email" id="email" size="30" required>
                <div><br/><br/></div>
                
                <label class="mdp" type="button"> Mot de passe</label>

                <input type="password" id="pass" name="password" required>

                <div><br/></div>

                <label class="mdp" type="button">Confirmation</label>

                <input type="password" id="confpass" name="confpassword" required>

                <div><br/></div>

                <label">Choisir une photo de profil : </label>

                <input type="file" name="image" id="file">

                <div><br/></div>

                <input class="confirmeInscription" type="submit" value="Inscription">

                <h2> Connexion </h2>

                <p> Tu as déjà un compte ? <br/> Connecte-toi ! </p>

                <button class="connexion" type="button" onclick="location.href='connexion.php'"> Je me connecte ! </button>
 </fieldset>
    </form>
        <a href="../accueil.php">Accueil</a>
    </div>
    </body> 
</html> 