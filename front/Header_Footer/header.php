<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../CSS/header.css" type="text/css">
    <script type="text/javascript" src="../JS/Sombre.js"></script>
    <title><?= isset($title)?$title:"" ?></title>
</head>

<header>
    <div class="header">
        <img class="hbox1" src="../IMG/logo.png" alt="Logo" />
        <ul class="hbox2">
            <li class="menu-item"><a href="../PHP/accueil.php">Accueil</a></li>
            <li class="menu-item"><a href="../PHP/cours.php">Cours</a></li>
            <li class="menu-item"><a href="../PHP/Forum">Forum</a></li>
            <div class="htrait">
            </div>
        </ul>

        <ul class="hbox3">
            <li class="menu-item connexion"><a href="../PHP/utilisateur/connexion.php">Connexion</a></li>
            <li class="menu-item inscription"><a href="../PHP/utilisateur/inscription.php">Inscription</a></li>
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
