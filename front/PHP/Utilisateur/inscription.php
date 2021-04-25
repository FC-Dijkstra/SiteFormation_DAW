<link rel="stylesheet" href="/front/CSS/Utilisateur/inscription.css" type="text/css" />
<div id="page">
    <!--<a href="index.php">
        <img class="hbox1" src="/front/IMG/logo.png" alt="Logo" />
    </a>-->
    <form action="/back/router.php" enctype="multipart/form-data" method="post">
        <fieldset class="form">
            <h2> Inscription </h2>

            <p> Pas encore inscrit ? <br /> Rejoins-nous ! </p>

            <label class="prenom formlabel" type="button"> Prénom</label>

            <input type="text" id="prenom" size="30" name="prenom" required>
            <div><br /></div>

            <label class="nom formlabel" type="button"> Nom</label>

            <input type="text" id="nom" size="30" name="nom" required>
            <div><br /></div>

            <label class="email formlabel" type="button"> Adresse mail</label>

            <input type="email" id="email" name="email" size="30" required>
            <div><br /><br /></div>

            <label class="mdp formlabel" type="button" > Mot de passe</label>

            <input type="password" id="pass" size="30" name="password" required>

            <div><br /></div>

            <label class="mdp formlabel" type="button">Confirmation</label>

            <input type="password" id="confpass" size="30" name="confpassword" required>

            <div><br /></div>

            <label">Choisir une photo de profil : </label>

                <input type="file" name="photo" id="file">

                <div><br /></div>
                <input type="hidden" value="<?= Token::get() ?>" name="csrf_token">
                <input type="hidden" value="inscription" name="action">
                <input class="confirmeInscription" type="submit" value="Inscription">

                <h2> Connexion </h2>

                <p> Tu as déjà un compte ? <br /> Connecte-toi ! </p>

                <button class="connexion" type="button" onclick="location.href='index.php?page=connexion'"> Je me connecte ! </button>
        </fieldset>
    </form>
    <!--<a href="index.php">Accueil</a>-->
</div>
</body>