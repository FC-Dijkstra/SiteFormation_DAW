<link rel="stylesheet" href="/front/CSS/Utilisateur/connexion.css" type="text/css" />
<div id="page">
    <!--
    <a href="index.php">
        <img class="hbox1" src="/front/IMG/logo.png" alt="Logo" />
    </a>-->
    <form class="connexion" action="/back/router.php" method="post">
        <fieldset class="form">
            <h2> Connexion </h2>
            <p> Pressé d'apprendre ? <br /> Connecte-toi ! </p>

            <label id="mail" class="formlabel" type="button"> Adresse mail</label>

            <input type="email" id="email" name="email" size="30" required>

            <div><br /></div>

            <label id="mdp" type="button" class="formlabel"> Mot de passe</label>

            <input type="password" id="pass" name="password" size="30" required>

            <div><br /></div>
            <input type="hidden" value="<?= Token::get() ?>" name="csrf_token">
            <input type="hidden" value="connexion" name="action">
            <input type="submit" id="connexion" value="Connexion">

            <h2> Inscription </h2>
            <p> Pas encore inscrit ? <br /> Rejoins-nous ! </p>
            <button class="inscription" type="button" onclick="location.href='index.php?page=inscription'"> Je m'inscris ! </button>
        </fieldset>
    </form>
    <!--<a href="index.php">Accueil</a>-->
</div>
</body>
