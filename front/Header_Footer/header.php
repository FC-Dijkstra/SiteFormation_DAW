<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/front/CSS/header.css" type="text/css">
    <script type="text/javascript" src="/front/JS/Sombre.js"></script>
    <title><?= isset($title)?$title:"" ?></title>
</head>

<header>
    <div class="header">

            <a href="/front/PHP/accueil.php">
            <img class="hbox1" src="/front/IMG/logo.png" alt="Logo"/></a>
            <ul class="hbox2">
            <li class="menu-item"><a href="/front/PHP/accueil.php">Accueil</a></li>
            <li class="menu-item"><a href="/front/PHP/cours.php">Cours</a></li>
            <li class="menu-item"><a href="/front/PHP/Forum">Forum</a></li>
            <div class="htrait">
            </div>
        </ul>

        <ul class="hbox3">
            <li class="menu-item connexion"><a href="/front/PHP/utilisateur/connexion.php">Connexion</a></li>
            <li class="menu-item inscription"><a href="/front/PHP/utilisateur/inscription.php">Inscription</a></li>
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
    <?= isset($content)?$content:"" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?= isset($scripts)?$scripts:"" ?>
</header>
