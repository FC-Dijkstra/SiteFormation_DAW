<header>
    <div class="header">

        <a href="/front/PHP/accueil.php">
            <img class="hbox1" src="/front/IMG/logo.png" alt="Logo"/></a>
        <ul class="hbox2">
            <li class="menu-item"><a href="index.php?page=accueil">Accueil</a></li>
            <li class="menu-item"><a href="index.php?page=cours">Cours</a></li>
            <li class="menu-item"><a href="index.php?page=accueilForum">Forum</a></li>
            <div class="htrait">
            </div>
        </ul>

        <ul class="hbox3">
            <li class="menu-item connexion"><a href="index.php?page=profil">Profil</a></li>
            <li class="menu-item inscription"><a href="/back/router.php?action=deconnexion&csrf_token=<?= $_SESSION["csrf_token"]?>">Déconnexion</a></li>
            <li class="menu-item-dark-mode">
                <div class="switch-dark-light">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" onclick="toggleTheme()"/>
                        <div class="slider round"></div>
                    </label>
                </div>
            </li>
        </ul>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</header>
